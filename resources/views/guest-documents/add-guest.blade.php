{{-- Guest Popup Form --}}
<style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    <div class="modal-body" id="popcontent">
        <form action="{{ route('query-guests.store') }}" method="post" enctype="multipart/form-data" id="task-form" class="custom-validation ajax-form">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="validationCustom02">&nbsp;&nbsp; </label>
                            <select name="title" class="form-control">
                                <option value="Mr." @selected($guest?->title == 'Mr.')>Mr.</option>
                                <option value="Mrs." @selected($guest?->title == 'Mrs.')>Mrs.</option>
                                <option value="Ms." @selected($guest?->title == 'Ms.')>Ms.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Prof.">Prof.</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="validationCustom02">First Name<span class="redmtext">*</span> </label>
                            <input type="text" class="form-control" required="" name="first_name" value="{{ $guest?->first_name }}"
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Last Name<span class="redmtext">*</span> </label>
                            <input type="text" class="form-control" required="" name="last_name" value="{{ $guest?->last_name }}"
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Gender<span class="redmtext">*</span> </label>
                            <select name="gender" class="form-control">
                                <option value="Male" @selected($guest?->gender == 'Male')>Male</option>
                                <option value="Female" @selected($guest?->gender == 'Female')>Female</option>
                                <option value="Other" @selected($guest?->gender == 'Other')>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="validationCustom02">Date of Birth* </label>
                            <input type="text" class="form-control" required="" name="dob" id="dob" value="{{ $guest?->dob ? \Carbon\Carbon::parse($guest->dob)->format('d-m-Y') : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
                    >
            </div>
            <input type="hidden" name="edit_id" value="{{ $guest?->id }}"><input name="query_id" type="hidden" id="" value="{{ $queryId??'' }}">
        </form>
        <script>
            $(function() {
                $("#dob").datepicker({
                    dateFormat: 'dd-mm-yy',
                    maxDate: new Date(),
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-90:+00"
                });
            });
        </script>
    </div>
</div>
