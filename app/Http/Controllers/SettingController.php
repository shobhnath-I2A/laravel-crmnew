<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\BranchMaster;
use App\Models\Rolemaster;
use App\Models\RolePermission;
use App\Models\PackageInclusion;
use App\Models\Automation;
use App\Models\User;
use App\Models\AppSetting;
use Illuminate\Support\Facades\Cache;

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

        if ($tab === 'branches-setting') {
            $data['branches'] = BranchMaster::latest()->get();
            // dd($data['branches']);
        }
        if ($tab === 'organisation-settings') {
            $data['organisation'] = $this->getSettingsGroup('organisation');
        }

        if ($tab === 'default-setting') {
            $data['default'] = $this->getSettingsGroup('default');
        }

        if ($tab === 'admin-settings') {
            $data['payment_gateway'] = $this->getSettingsGroup('payment_gateway');
        }

        if ($tab === 'package-inclusions') {
            $data['package_inclusions'] = $this->getSettingsGroup('package_inclusions');
        }
        if ($tab === 'automation') {

            $data['automations'] = Automation::with([
                'destination',
                'package',
                'queryStatus',
                'user'
            ])->latest()->get();
        }
        // if ($tab === 'automation') {
        //     $automation = Automation::get();
        //     $data['automation'] = $automation;
        // }
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

    private function countryCode()
    {
        return auth()->user()->user_country ?? '1550';
    }

    private function saveSettingsGroup($groupName, array $settings)
    {
        $countryCode = $this->countryCode();

        foreach ($settings as $key => $value) {
            AppSetting::updateOrCreate(
                [
                    'country_code' => $countryCode,
                    'group_name'   => $groupName,
                    'key_name'     => $key,
                ],
                [
                    'value' => $value,
                ]
            );
        }

        Cache::forget("settings_{$countryCode}_{$groupName}");
    }

    private function getSettingsGroup($groupName)
    {
        $countryCode = $this->countryCode();

        return Cache::remember("settings_{$countryCode}_{$groupName}", 3600, function () use ($countryCode, $groupName) {
            return AppSetting::where('country_code', $countryCode)
                ->where('group_name', $groupName)
                ->pluck('value', 'key_name');
        });
    }
    public function saveOrganisation(Request $request)
    {
        $request->validate([
            'organisation_name' => 'required|string|max:255',
            'invoice_email'    => 'nullable|email|max:255',
            'invoice_phone'    => 'nullable|string|max:50',
            'address'          => 'nullable|string|max:500',
            'gstn'             => 'nullable|string|max:100',
            'state'            => 'nullable|string|max:100',
            'state_code'       => 'nullable|string|max:100',
        ]);

        $this->saveSettingsGroup('organisation', [
            'organisation_name' => $request->organisation_name,
            'invoice_email'    => $request->invoice_email,
            'invoice_phone'    => $request->invoice_phone,
            'address'          => $request->address,
            'gstn'             => $request->gstn,
            'state'            => $request->state,
            'state_code'       => $request->state_code,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Organisation settings saved successfully.',
        ]);
    }
    // public function saveOrganisation(Request $request)
    // {
    //     $this->saveSettingsGroup('organisation', $request->only([
    //         'organisation_name',
    //         'invoice_email',
    //         'invoice_phone',
    //         'address',
    //         'gstn',
    //         'state',
    //         'state_code',
    //     ]));

    //     return back()->with('success', 'Organisation settings saved successfully.');
    // }

    public function saveDefault(Request $request)
    {
        $data = $request->only([
            'invoice_terms',
            'package_terms',
            'bank_information',
            'google_sheet_url',
        ]);

        if ($request->hasFile('invoice_logo')) {
            $data['invoice_logo'] = $request->file('invoice_logo')->store('settings', 'public');
        }

        $this->saveSettingsGroup('default', $data);

        return back()->with('success', 'Default settings saved successfully.');
    }

    public function savePaymentGateway(Request $request)
    {
        $this->saveSettingsGroup('payment_gateway', $request->only([
            'api_key',
            'api_secret',
        ]));

        return back()->with('success', 'Payment gateway settings saved successfully.');
    }

    public function savePackageInclusions(Request $request)
    {
        $this->saveSettingsGroup('package_inclusions', $request->only([
            'inclusions_title',
            'package_inclusions',
            'important_tips_title',
            'package_important_tips',
            'exclusions_title',
            'package_exclusions',
            'travel_information_title',
            'package_travel_info',
        ]));

        return response()->json([
            'status' => true,
            'message' => 'Package inclusions saved successfully.',
        ]);
    }
    // public function savePackageInclusions(Request $request)
    // {
    //     $data = $request->only([
    //         'inclusions_title',
    //         'package_inclusions',

    //         'important_tips_title',
    //         'package_important_tips',

    //         'exclusions_title',
    //         'package_exclusions',

    //         'travel_information_title',
    //         'package_travel_info',
    //     ]);

    //     foreach (
    //         [
    //             'inclusions_img',
    //             'important_tips_img',
    //             'exclusions_img',
    //             'travel_info_img',
    //         ] as $fileKey
    //     ) {
    //         if ($request->hasFile($fileKey)) {
    //             $data[$fileKey] = $request->file($fileKey)->store('settings/package', 'public');
    //         }
    //     }

    //     $this->saveSettingsGroup('package_inclusions', $data);

    //     return back()->with('success', 'Package inclusions settings saved successfully.');
    // }
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
    public function createOrganization()
    {
        $organisation = $this->getSettingsGroup('organisation');

        return view('setting.organisationsettings.index', compact('organisation'));
    }
    // public function createOrganization(){
    //     return view('setting.organisationsettings.index');
    // }

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
