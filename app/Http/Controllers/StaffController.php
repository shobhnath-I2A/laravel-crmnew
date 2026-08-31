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
        $userPermissions = collect();
        return view('setting.team.add-edit-team', compact('roles', 'userPermissions'));
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
                'role_id'         => $request->branch_Id,

                'branch_Id'        => $request->branch_Id,
                'user_type'        => $request->user_type ?? 1,
                'user_country'     => $request->user_country ?? config('crm.default_country_code'),
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
        return view('setting.team.add-edit-team', compact('user', 'roles', 'userPermissions'));
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
                'role_id'         => $request->branch_Id,

                'branch_Id'        => $request->branch_Id,
                'user_type'        => $request->user_type ?? 1,
                'user_country'     => $request->user_country ?? config('crm.default_country_code'),
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
    public function onlineUsers()
    {
        $onlineSince = now()->subMinutes(5);

        $users = User::query()
            ->select([
                'id',
                'name',
                'last_name',
                'email',
                'status',
                'last_seen_at',
            ])
            ->where('status', 1)
            ->orderByRaw(
                'CASE WHEN last_seen_at >= ? THEN 0 ELSE 1 END',
                [$onlineSince]
            )
            ->orderBy('name')
            ->get()
            ->map(function ($user) use ($onlineSince) {

                $isOnline = $user->last_seen_at
                    && $user->last_seen_at->gte($onlineSince);

                return [
                    'id' => $user->id,

                    'name' => trim(
                        $user->name . ' ' . $user->last_name
                    ),

                    'email' => $user->email,

                    'is_online' => $isOnline,

                    'last_seen' => $user->last_seen_at
                        ? $user->last_seen_at->diffForHumans()
                        : null,
                ];
            });

        return response()->json([
            'status' => true,

            'online_count' => $users
                ->where('is_online', true)
                ->count(),

            'users' => $users,
        ]);
    }
    private function savePermissions(Request $request, $userId)
    {
        foreach ($request->permissions ?? [] as $module => $permission) {
            UserPermission::create([
                'user_id'      => $userId,
                'module'       => $module,
                'can_view'     => isset($permission['view']) ? 1 : 0,
                'can_add'      => isset($permission['add']) ? 1 : 0,
                'can_edit'     => isset($permission['edit']) ? 1 : 0,
                'can_delete'   => isset($permission['delete']) ? 1 : 0,
                'can_download' => isset($permission['download']) ? 1 : 0,
            ]);
        }
    }
}
