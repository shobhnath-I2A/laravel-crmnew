<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form class="custom-validation ajax-form"
        action="{{ isset($user) ? route('staff.update', $user->id) : route('staff.store') }}" method="POST"
        enctype="multipart/form-data">

        @csrf
        @if (isset($user))
            @method('PUT')
        @endif
        {{-- <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data"> --}}
            {{-- @csrf --}}
            <div class="container-fluid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>First Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $user->name ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ old('last_name', $user->last_name ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email / Username</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email ?? '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Portal</label>
                            <input type="text" class="form-control" value="trekhops.in" disabled>
                            <input type="hidden" name="user_country" value="1550">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Role</label>
                            <select name="branch_Id" class="form-control" required>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('branch_Id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                        @if (isset($role->branch))
                                            — {{ $role->branch->name }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>

                            <input type="hidden" name="user_type" value="1">
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
                                        <th><input type="checkbox" id="selectAllView">  View</th>
                                        <th><input type="checkbox" id="selectAllAdd">  Add</th>
                                        <th><input type="checkbox" id="selectAllEdit">  Edit</th>
                                        <th><input type="checkbox" id="selectAllDelete">  Delete</th>
                                        <th><input type="checkbox" id="selectAllDownload">  Download</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($modules as $moduleValue => $module)
                                        <tr>
                                            <td>{{ $module['label'] }}</td>

                                            <td>
                                                <input type="checkbox" class="view-checkbox"
                                                    name="permissions[{{ $moduleValue }}][view]" value="1"
                                                    {{ optional($userPermissions->get($moduleValue))->can_view == 1 ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                <input type="checkbox" class="add-checkbox"
                                                    name="permissions[{{ $moduleValue }}][add]" value="1"
                                                    {{ optional($userPermissions->get($moduleValue))->can_add == 1 ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                <input type="checkbox" class="edit-checkbox"
                                                    name="permissions[{{ $moduleValue }}][edit]" value="1"
                                                    {{ optional($userPermissions->get($moduleValue))->can_edit == 1 ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                <input type="checkbox" class="delete-checkbox"
                                                    name="permissions[{{ $moduleValue }}][delete]" value="1"
                                                    {{ optional($userPermissions->get($moduleValue))->can_delete == 1 ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                <input type="checkbox" class="download-checkbox"
                                                    name="permissions[{{ $moduleValue }}][download]" value="1"
                                                    {{ optional($userPermissions->get($moduleValue))->can_download == 1 ? 'checked' : '' }}>
                                            </td>
                                        </tr>

                                        @if ($moduleValue === 'Query')
                                            <tr>
                                                <td colspan="6">
                                                    <select name="show_query_status" class="form-control">
                                                        <option value="0"
                                                            {{ old('show_query_status', $user->show_query_status ?? 0) == 0 ? 'selected' : '' }}>
                                                            Show Assigned Query Only
                                                        </option>
                                                        <option value="1"
                                                            {{ old('show_query_status', $user->show_query_status ?? 0) == 1 ? 'selected' : '' }}>
                                                            Show Confirmed Query / Proposal Only
                                                        </option>
                                                        <option value="2"
                                                            {{ old('show_query_status', $user->show_query_status ?? 0) == 2 ? 'selected' : '' }}>
                                                            Show All Query
                                                        </option>
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
                                <input type="checkbox" name="status" value="1"
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
<script>
    function handleSelectAll(masterId, childClass) {
        const master = document.getElementById(masterId);
        const children = document.querySelectorAll('.' + childClass);

        if (!master) return;

        master.addEventListener('change', function() {
            children.forEach(cb => cb.checked = master.checked);
        });

        children.forEach(cb => {
            cb.addEventListener('change', function() {
                master.checked = [...children].every(item => item.checked);
            });
        });
    }

    handleSelectAll('selectAllView', 'view-checkbox');
    handleSelectAll('selectAllAdd', 'add-checkbox');
    handleSelectAll('selectAllEdit', 'edit-checkbox');
    handleSelectAll('selectAllDelete', 'delete-checkbox');
    handleSelectAll('selectAllDownload', 'download-checkbox');
</script>
