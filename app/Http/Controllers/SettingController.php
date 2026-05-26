<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\BranchMaster;
use App\Models\Rolemaster;
use App\Models\RolePermission;
use App\Models\PackageInclusion;
use App\Models\User;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $tabs = [
            'team-management' => [
                'view' => 'setting.tabs.team-management',
                'title' => 'Team Management',
            ],
            'organisation-settings' => [
                'view' => 'setting.tabs.organisation-settings',
                'title' => 'Organisation Settings',
            ],
            'default-setting' => [
                'view' => 'setting.tabs.default-setting',
                'title' => 'Default Settings',
            ],
            'admin-settings' => [
                'view' => 'setting.tabs.admin-settings',
                'title' => 'Admin Settings',
            ],
            'package-inclusions' => [
                'view' => 'setting.tabs.package-inclusions',
                'title' => 'Package Inclusions',
            ],
            'automation' => [
                'view' => 'setting.tabs.automation',
                'title' => 'Automation',
            ],
            'branches-setting' => [
                'view' => 'setting.tabs.branches-setting',
                'title' => 'Branch Setting',
            ],
            'roles' => [
                'view' => 'setting.tabs.roles',
                'title' => 'Roles',
            ],
            'apidocs' => [
                'view' => 'setting.tabs.apidocs',
                'title' => 'API Docs',
            ],
        ];

        $tab = $request->query('tab', 'team-management');

        if (!array_key_exists($tab, $tabs)) {
            $tab = 'team-management';
        }

        $data = [];

        if ($tab === 'team-management') {
            // $teams = User::all();
            $teams = User::with('role.branch')->get();
            $data['teams'] = $teams;
            // dd($data['branches']);
        }
        if ($tab === 'package-inclusions') {
            $inclusions = PackageInclusion::where('user_id', auth()->id())->first();
            $data['inclusions'] = $inclusions;
            // dd($data['branches']);
        }
        if ($tab === 'branches-setting') {
            $data['branches'] = BranchMaster::latest()->get();
            // dd($data['branches']);
        }

        if ($tab === 'roles') {

            $roles = RoleMaster::with([
                'branch',
                'childrenRecursive'
            ])
                ->where('parent_id', 0)
                ->where('status', 1)
                ->orderBy('id', 'asc')
                ->get();

            $data['roles'] = $roles;
        }

        return view('setting.index', [
            'tab' => $tab,
            'tabs' => $tabs,
            'tabView' => $tabs[$tab]['view'],
            'tabTitle' => $tabs[$tab]['title'],
            'data' => $data,
        ]);
        //  try {
        //         // Default tab = teams
        //         $tab = $request->query('tab', 'team-management');
        //         return view('setting.index', compact('tab'));

        //     } catch (\Exception $e) {
        //         Log::error('Error fetching Setting Tabs', [
        //             'exception' => $e
        //         ]);

        //         return redirect()->route('settings.show', ['tab' => 'teams'])
        //             ->with('error', 'Something went wrong!');
        //     }
        // return view('setting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        try {
            // Default tab = teams
            $tab = $request->query('tab', 'teams');
            return view('setting.index', compact('tab'));
        } catch (\Exception $e) {
            Log::error('Error fetching Setting Tabs', [
                'exception' => $e
            ]);

            return redirect()->route('settings.show', ['tab' => 'teams'])
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
