<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPermission;
use App\Models\RoleMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function create()
    {
        $roles = RoleMaster::with('branch')
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('setting.team.add-edit-team', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'branch_Id'  => 'required',
        ]);

        DB::transaction(function () use ($request) {

            $plainPassword = rand(100000, 999999);

            $user = User::create([
                'name'       => $request->name,
                'last_name'        => $request->last_name,
                'email'           => $request->email,
                'password'        => Hash::make($plainPassword),

                'role'            => 'team',
                'role_id'         => $request->branch_Id,

                'branch_Id'        => $request->branch_Id,
                'user_type'        => $request->user_type ?? 1,
                'user_country'     => $request->user_country ?? 1550,
                'show_query_status' => $request->show_query_status ?? 0,
                'status'          => $request->has('status') ? 1 : 0,
            ]);

            $this->savePermissions($request, $user->id);
        });

        return redirect()->back()->with('success', 'Staff user created successfully.');
    }

    public function edit($id)
    {
        $user = User::with('permissions')->findOrFail($id);
        $roles = RoleMaster::with('branch')
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
        // $roles = RoleMaster::with('branch')
        //     ->where('status', 1)
        //     ->orderBy('id', 'asc')
        //     ->get();
        $userPermissions = UserPermission::where('user_id', $id)
            ->get()
            ->keyBy('module');
        // dd($userPermissions);
        return view('setting.team.add-edit-team', compact('user', 'roles','userPermissions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'branch_Id'  => 'required',
        ]);

        DB::transaction(function () use ($request, $user) {

            $user->update([
                'name'       => $request->name,
                'last_name'        => $request->last_name,
                'email'           => $request->email,
                'role'            => 'team',
                'role_id'         => $request->branch_Id,

                'branch_Id'        => $request->branch_Id,
                'user_type'        => $request->user_type ?? 1,
                'user_country'     => $request->user_country ?? 1550,
                'show_query_status' => $request->show_query_status ?? 0,
                'status'          => $request->has('status') ? 1 : 0,
            ]);

            UserPermission::where('user_id', $user->id)->delete();

            $this->savePermissions($request, $user->id);
        });

        return response()->json([
            'status' => true,
            'message' => 'User updated successfully.',
        ]);
    }

    private function savePermissions(Request $request, $userId)
    {
        $permissions = $request->permissions ?? [];

        foreach ($permissions as $module => $permission) {
            UserPermission::create([
                'user_id'      => $userId,
                'module'       => $module,
                'can_view'     => isset($permission['view']) ? 1 : 0,
                'can_add_edit' => isset($permission['add_edit']) ? 1 : 0,
            ]);
        }
    }
}
