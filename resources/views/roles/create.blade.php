<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form action="#" method="POST">
        @csrf
        @method('POST')
        <div class="modal-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="validationCustom02">First Name </label>
                        <input type="text" class="form-control" required="" name="firstName" value="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="validationCustom02">Last Name </label>
                        <input type="text" class="form-control" required="" name="lastName" value="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="validationCustom02">Email (Username)</label>
                        <input type="text" class="form-control" required="" name="email" value="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="validationCustom02">Portal</label>
                        <input type="text" class="form-control" name="userCountry" value="trekhops.in"
                            disabled="">

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Role</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">No Parent Role</option>
                            {{-- @foreach ($rolesTree as $role)
                                <option value="{{ $role->id }}">
                                    {{ str_repeat('--', $role->level + 1) }}{{ $role->name }} (Inhouse)
                                </option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr style="background:#DEE6F8;">
                            <th>Module Permission</th>
                            <th>View</th>
                            <th>Add/Edit</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td>{{ $module['label'] }}</td>

                                <td>
                                    @if ($module['view'])
                                        <input type="checkbox" name="permissions[{{ $module['module'] }}][view]">
                                    @endif
                                </td>

                                <td>
                                    @if ($module['add_edit'])
                                        <input type="checkbox" name="permissions[{{ $module['module'] }}][add_edit]">
                                    @endif
                                </td>

                                <td>
                                    @if ($module['download'])
                                        <input type="checkbox" name="permissions[{{ $module['module'] }}][download]">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-6">
                    <label for="example-text-input" class="col-md-1 col-form-label">Active</label>
                    <div class="col-md-10">
                        <input name="status" type="checkbox" id="switch3" value="1" switch="bool"
                            checked="">
                        <label for="switch3" data-on-label="Yes" data-off-label="No" style="margin-top: 6px;"></label>
                    </div>
                </div>

                <div class="modal-footer">
                    <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
                        onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
                </div>
            </div>
    </form>
</div>
