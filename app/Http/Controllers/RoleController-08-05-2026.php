<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rolemaster;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RoleController extends Controller
{
    // public function create()
    // {
    //     $modules = config('crm_permissions');

    //     return view('roles.create', compact('modules'));
    // }
    public function create()
    {
        $modules = config('crm_permissions');

        $roles = Rolemaster::where('status', 1)
            ->orderBy('parent_id')
            ->orderBy('id')
            ->get();

        $rolesTree = $this->buildRoleTree($roles);

        return view('roles.create', compact('modules', 'rolesTree'));
    }

    private function buildRoleTree($roles, $parentId = 0, $level = 0)
    {
        $result = [];

        foreach ($roles as $role) {
            if ((int) $role->parent_id === (int) $parentId) {
                $role->level = $level;
                $result[] = $role;

                $children = $this->buildRoleTree($roles, $role->id, $level + 1);
                $result = array_merge($result, $children);
            }
        }

        return $result;
    }

public function store(Request $request)
{
    try {
        $request->validate([
            'firstName' => 'required|string|max:100',
            'lastName'  => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            // remove name required if form does not send name
            'parent_id' => 'nullable|integer',
        ]);

        $role = DB::transaction(function () use ($request) {

            $roleName = trim($request->firstName . ' ' . $request->lastName . ' Role');

            $role = Rolemaster::create([
                'name'      => $request->name ?? $roleName,
                'branch_id' => 1,
                'parent_id' => $request->parent_id ?? 0,
                'status'    => $request->has('status') ? 1 : 0,
                'created_by'  => auth()->id(),
            ]);

            foreach (config('crm_permissions') as $item) {
                $module = $item['module'];
                $permission = $request->permissions[$module] ?? [];

                RolePermission::create([
                    'role_id'       => $role->id,
                    'module'        => $module,
                    'can_view'      => isset($permission['view']),
                    'can_add_edit'  => isset($permission['add_edit']),
                    'can_download'  => isset($permission['download']),
                ]);
            }

            User::create([
                'name'     => trim($request->firstName . ' ' . $request->lastName),
                'email'    => $request->email,
                'password' => Hash::make('12345678'),
                'role'     => 'team',
                'role_id'  => $role->id,
            ]);

            return $role;
        });

        return response()->json([
            'status'  => true,
            'message' => 'Role and user created successfully',
            'data'    => $role
        ]);

    } catch (ValidationException $ve) {
        return response()->json([
            'status'  => false,
            'message' => 'Validation Failed',
            'errors'  => $ve->errors()
        ], 422);

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

    public function edit($id)
    {
        $role = Rolemaster::with('permissions')->findOrFail($id);
        $modules = config('crm_permissions');

        $permissions = $role->permissions->keyBy('module');

        return view('roles.create', compact('role', 'modules', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Rolemaster::findOrFail($id);

        DB::transaction(function () use ($request, $role) {
            $role->update([
                'name' => $request->name,
                'branch_id' => $request->branch_id,
                'parent_id' => $request->parent_id ?? 0,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            foreach (config('crm_permissions') as $item) {
                $module = $item['module'];
                $permission = $request->permissions[$module] ?? [];

                RolePermission::updateOrCreate(
                    [
                        'role_id' => $role->id,
                        'module' => $module,
                    ],
                    [
                        'can_view' => isset($permission['view']),
                        'can_add_edit' => isset($permission['add_edit']),
                        'can_download' => isset($permission['download']),
                    ]
                );
            }
        });

        return redirect()->back()->with('success', 'Role updated successfully');
    }
}
