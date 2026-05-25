<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPermission;
use App\Models\RoleMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\RolePermission;
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
                'last_name'        => $request->last_name,
                'name'            => $request->name,
                'email'           => $request->email,
                'password'        => Hash::make($plainPassword),

                'role'            => 'team',
                'role_id'         => $request->branch_Id,

                'branch_Id'        => $request->branch_Id,
                'userType'        => $request->userType ?? 1,
                'userCountry'     => $request->userCountry ?? 1550,
                'showQueryStatus' => $request->showQueryStatus ?? 0,
                'status'          => $request->has('status') ? 1 : 0,
            ]);

            $this->savePermissions($request, $user->id);
        });

        return redirect()->back()->with('success', 'Staff user created successfully.');
    }


public function edit($id)
{
    $roles = RoleMaster::with('branch')
        ->where('status', 1)
        ->orderBy('id', 'asc')
        ->get();

    $user = User::findOrFail($id);

    $userPermissions = UserPermission::where('user_id', $user->id)
        ->get()
        ->keyBy('module');

    return view('setting.team.add-edit-team', compact(
        'roles',
        'user',
        'userPermissions'
    ));
}
    // public function edit($id)
    // {
    //     $roles = RoleMaster::with('branch')
    //         ->where('status', 1)
    //         ->orderBy('id', 'asc')
    //         ->get();

    //     $user = User::with('permissions')->findOrFail($id);
    // dd($user);
    //     return view('setting.team.add-edit-team', compact('roles', 'user'));
    // }

    public function update(Request $request, $id)
    {

    // dd($request);
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'branch_Id'  => 'required',
        ]);

        DB::transaction(function () use ($request, $user) {

            $user->update([
                'last_name'        => $request->last_name,
                'name'            => $request->name,
                'email'           => $request->email,

                'role'            => 'team',
                'role_id'         => $request->branch_Id,

                'branch_Id'        => $request->branch_Id,
                'user_type'        => $request->userType ?? 1,
                'user_country'     => $request->userCountry ?? 1550,
                'show_query_status' => $request->showQueryStatus ?? 0,
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
        $viewPermissions = $request->permissionView ?? [];
        $addEditPermissions = $request->permissionAddEdit ?? [];

        $allModules = array_unique(array_merge($viewPermissions, $addEditPermissions));

        foreach ($allModules as $module) {
            UserPermission::create([
                'user_id'      => $userId,
                'module'       => $module,
                'can_view'     => in_array($module, $viewPermissions) ? 1 : 0,
                'can_add_edit' => in_array($module, $addEditPermissions) ? 1 : 0,
            ]);
        }
    }
}
