<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rolemaster;
use App\Models\BranchMaster;
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
    public function index()
    {
        $roles = RoleMaster::with('childrenRecursive')
            ->where('parent_id', 0)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('setting.roles', compact('roles'));
    }
    public function create()
    {
        $branches = BranchMaster::where('status', 1)->orderBy('name')->get();

        $roles = Rolemaster::where('status', 1)
            ->orderBy('name')
            ->get();

        return view('setting.add-role', compact('branches', 'roles'));
        // return view('setting.add-role');
    }
    // public function create()
    // {
    //     $modules = config('crm_permissions');

    //     $roles = Rolemaster::where('status', 1)
    //         ->orderBy('parent_id')
    //         ->orderBy('id')
    //         ->get();

    //     $rolesTree = $this->buildRoleTree($roles);

    //     return view('roles.create', compact('modules', 'rolesTree'));
    // }

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
                'branch_id' => 'required|exists:branch_masters,id',
                'parent_id' => 'nullable|integer',
                'name' => 'required|string|max:100',
                'status' => 'required|in:0,1',
            ]);

            $role = Rolemaster::create([
                'branch_id' => $request->branch_id,
                'parent_id' => $request->parent_id ?? 0,
                'name' => $request->name,
                'status' => $request->status,
                'created_by' => auth()->id(),
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Role created successfully',
                'data' => $role
            ], 201);
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

        try {
            $role = Rolemaster::findOrFail($id);

            $branches = BranchMaster::where('status', 1)
                ->orderBy('name')
                ->get();

            $roles = Rolemaster::where('status', 1)
                ->where('id', '!=', $id)
                ->orderBy('name')
                ->get();
            return view('setting.add-role',  compact('role', 'branches', 'roles'));
        } catch (\Exception $e) {
            Log::error('Error fetching Role for Edit', [
                'exception' => $e,
                'role_id' => $id
            ]);
        }

        // return view('roles.create', compact('role', 'branches', 'roles'));

        // $role = Rolemaster::with('permissions')->findOrFail($id);
        // $modules = config('crm_permissions');

        // $permissions = $role->permissions->keyBy('module');

        // return view('roles.create', compact('role', 'modules', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        try {
            $role = Rolemaster::findOrFail($id);
            $request->validate([
                'branch_id' => 'required|exists:branch_masters,id',
                'parent_id' => 'nullable|integer',
                'name' => 'required|string|max:100',
                'status' => 'required|in:0,1',
            ]);

            $role->update([
                'branch_id' => $request->branch_id,
                'parent_id' => $request->parent_id ?? 0,
                'name' => $request->name,
                'status' => $request->status,
                'created_by' => auth()->id(),
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Role Update successfully!!!',
                'data' => $role
            ], 200);
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
        // return redirect()->back()->with('success', 'Role updated successfully');
    }
}
