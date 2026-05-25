<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
       action="{{ isset($user) ? route('staff.update', $user->id) : route('staff.store') }}"
        method="POST" enctype="multipart/form-data">

        @csrf
       @if (isset($user))
            @method('PUT')
        @endif
        <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>First Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user_last_name ??'') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email / Username</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Portal</label>
                            <input type="text" class="form-control" value="trekhops.in" disabled>
                            <input type="hidden" name="userCountry" value="1550">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Role</label>
                            <select name="branchId" class="form-control" required>
                                <option value="">Select Role</option>

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('branchId') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name ?? ($role->role_name ?? 'Role ' . $role->id) }}
                                        @if (isset($role->branch))
                                            — {{ $role->branch->name ?? ($role->branch->branch_name ?? '') }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>

                            <input type="hidden" name="userType" value="1">
                        </div>

                        <div class="col-md-12 mb-3">

                            @php
                                $modules = [
                                    'Query' => [
                                        'label' => 'Query',
                                        'add_edit' => true,
                                    ],
                                    'Proposal' => [
                                        'label' => 'Proposal',
                                        'add_edit' => true,
                                    ],
                                    'Mails' => [
                                        'label' => 'Mails',
                                        'add_edit' => true,
                                    ],
                                    'Task' => [
                                        'label' => "Task / Followup's",
                                        'add_edit' => true,
                                    ],
                                    'Suppliers' => [
                                        'label' => 'Suppliers Communication',
                                        'add_edit' => true,
                                    ],
                                    'TourExpences' => [
                                        'label' => 'Post Sales Supplier',
                                        'add_edit' => true,
                                    ],
                                    'Operation' => [
                                        'label' => 'Voucher',
                                        'add_edit' => true,
                                    ],
                                    'Billing' => [
                                        'label' => 'Billing',
                                        'add_edit' => true,
                                    ],
                                    'Guest' => [
                                        'label' => 'Guest Docs.',
                                        'add_edit' => true,
                                    ],
                                    'History' => [
                                        'label' => 'History',
                                        'add_edit' => false,
                                    ],
                                    'Itinerary' => [
                                        'label' => 'Itinerary',
                                        'add_edit' => true,
                                    ],
                                    'Client' => [
                                        'label' => 'Client',
                                        'add_edit' => true,
                                    ],
                                    'SupplierMaster' => [
                                        'label' => 'Supplier',
                                        'add_edit' => true,
                                    ],
                                    'Report' => [
                                        'label' => 'Report',
                                        'add_edit' => false,
                                    ],
                                    'RoomType' => [
                                        'label' => 'Room Type',
                                        'add_edit' => false,
                                    ],
                                    'MealPlan' => [
                                        'label' => 'Meal Plan',
                                        'add_edit' => false,
                                    ],
                                    'Hotel' => [
                                        'label' => 'Hotel',
                                        'add_edit' => false,
                                    ],
                                    'Activity' => [
                                        'label' => 'Activity',
                                        'add_edit' => false,
                                    ],
                                    'Transfer' => [
                                        'label' => 'Transfer',
                                        'add_edit' => false,
                                    ],
                                    'PackagePrice' => [
                                        'label' => 'Show Package Price',
                                        'add_edit' => false,
                                    ],
                                    'PackageQuery' => [
                                        'label' => 'Package Query',
                                        'add_edit' => false,
                                    ],
                                ];
                            @endphp

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th width="15%">View</th>
                                        <th width="20%">Add/Edit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($modules as $moduleValue => $module)
                                        <tr>
                                            <td>{{ $module['label'] }}</td>

                                            <td>
                                              <input type="checkbox"
                                                name="permissionView[]"
                                                value="{{ $moduleValue }}"
                                                {{ isset($userPermissions[$moduleValue]) && $userPermissions[$moduleValue]->can_view ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                @if ($module['add_edit'])
                                                    <input type="checkbox"
                                                        name="permissionAddEdit[]"
                                                        value="{{ $moduleValue }}"
                                                        {{ isset($userPermissions[$moduleValue]) && $userPermissions[$moduleValue]->can_add_edit ? 'checked' : '' }}>
                                                @endif
                                            </td>
                                        </tr>

                                        @if ($moduleValue === 'Query')
                                            <tr>
                                                <td colspan="3">
                                                    <select name="showQueryStatus" class="form-control">
                                                        <option value="0">Show Assigned Query Only</option>
                                                        <option value="1">Show Confirmed Query / Proposal Only
                                                        </option>
                                                        <option value="2">Show All Query</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>
                                <input type="checkbox"
                                    name="status"
                                    value="1"
                                    {{ old('status', $user->status ?? 1) ? 'checked' : '' }}>
                                Active
                            </label>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
</div>
