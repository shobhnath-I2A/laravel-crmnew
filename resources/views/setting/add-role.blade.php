<style>
    .popup-box {
        max-width: 25%;
    }
</style>
<div class="wrapper" style="margin-top: 0px; padding:15px;">

    <form class="custom-validation ajax-form"
        action="{{ isset($role) ? route('roles.update', $role->id ?? '') : route('roles.store') }}"
        method="POST" enctype="multipart/form-data">

        @csrf
        @if (isset($role))
            @method('PUT')
        @endif
        <div class="container-fluid">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Branch <span class="redmtext">*</span></label>
                         <select name="branch_id" class="form-control reqfield">
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">
                                    {{ $branch->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label>Parent</label>
                        <select name="parent_id" class="form-control reqfield @error('parent_id') is-invalid @enderror">
                            <option value="0">No Parent</option>
                            @foreach($roles as $parentRole)
                                <option value="{{ $parentRole->id }}"
                                    {{ old('parent_id', $role->parent_id ?? 0) == $parentRole->id ? 'selected' : '' }}>
                                    {{ $parentRole->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="col-md-12">
                        <label>Role Name <span class="redmtext">*</span></label>
                        <input type="text" name="name"
                            class="form-control reqfield @error('name') is-invalid @enderror"
                            value="{{ old('name', $role->name ?? '') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="col-form-label">Active</label>
                        <div>
                            <input name="status" type="checkbox" id="switch3" value="1" switch="bool" {{ old('status', $role->status ?? 1) == 1 ? 'checked' : '' }} />
                            <label for="switch3" data-on-label="Yes" data-off-label="No" style="margin-top: 6px;"> </label>
                        </div>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
            {{-- Buttons --}}
            <div class="text-end mb-3">
                <button type="button" class="btn btn-secondary btn-lg" onclick="closePopup();">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary savingbutton">
                    Save
                </button>
            </div>

        </div>
    </form>
</div>
