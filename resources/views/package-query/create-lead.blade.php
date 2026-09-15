<div class="wrapper" style="margin-top:0; padding:15px;">

    <form action="{{ route('leads.store') }}" method="POST" id="leadForm" class="custom-validation ajax-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="portal_id" value="{{ old('portal_id', auth()->user()->portal_id ?? (session('portal_id') ?? session('userCountry'))) }}">
        <div class="container-fluid">
            {{-- CLIENT INFORMATION --}}
            <div class="card shadow-sm mb-3">

                <div class="card-header bg-light">
                    <strong>Client Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"> Client Name <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}"
                                class="form-control @error('full_name') is-invalid @enderror" required>
                            @error('full_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label"> Email </label>
                            <input type="email" name="email" value="{{ old('email') }}"class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Phone Code</label>
                            <input type="text" name="phone_code" value="{{ old('phone_code', '+91') }}" class="form-control">
                        </div>
                        <div class="col-md-9 mb-3">
                            <label class="form-label"> Mobile <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="phone" value="{{ old('phone') }}"  class="form-control @error('phone') is-invalid @enderror" maxlength="20" required>
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            {{-- TRAVEL DETAILS --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Travel Details</strong>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"> Origin
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="from_city" value="{{ old('from_city') }}" class="form-control @error('from_city') is-invalid @enderror" placeholder="Delhi" required>
                            @error('from_city')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">Destination<span class="text-danger">*</span></label>
                            <input type="text" name="to_city" value="{{ old('to_city') }}" class="form-control @error('to_city') is-invalid @enderror" placeholder="Dubai" required>
                            @error('to_city')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label"> From Date <span class="text-danger">*</span> </label>
                            <input type="date" name="start_date" id="startDate" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}" class="form-control" required>
                            @error('start_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label"> To Date <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" id="endDate" value="{{ old('end_date') }}"
                                min="{{ date('Y-m-d') }}" class="form-control" required>
                            @error('end_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
            {{-- PASSENGERS --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light"> <strong>Passengers</strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="adult"> Adult </label>
                            <input type="number" name="adult" value="{{ old('adult', 1) }}" min="1" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="child"> Child </label>
                            <input type="number" name="child" value="{{ old('child', 0) }}" min="0" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="infant"> Infant </label>
                            <input type="number" name="infant" value="{{ old('infant', 0) }}" min="0" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            {{-- LEAD INFORMATION --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Lead Information</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="source"> Lead Source </label>
                            <select name="source" class="form-control">

                                <option value="Manual"> Manual </option>
                                <option value="Website"> Website </option>
                                <option value="Google"> Google </option>
                                <option value="Facebook"> Facebook </option>
                                <option value="Referral"> Referral</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="priority"> Priority </label>
                            <select name="priority" class="form-control">
                                <option value="0"> General </option>
                                <option value="1"> Hot </option>
                                <option value="2"> Warm </option>
                                <option value="3"> Cold </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="budget"> Budget </label>
                            <input type="number" name="budget" value="{{ old('budget') }}" min="0"
                                step="0.01" class="form-control">

                        </div>
                       <div class="col-md-6 mb-3">
                            <label for="assign_to"> Assign To </label>
                            <select name="assign_to" id="assign_to" class="form-control">
                                <option value="">Unassigned</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="campaign"> Campaign </label>
                            <input type="text" name="campaign" value="{{ old('campaign') }}"
                                class="form-control">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="company_name"> Company Name </label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            {{-- REMARK --}}
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <strong>Remark</strong>
                </div>
                <div class="card-body">
                    <textarea name="description" rows="4" class="form-control" placeholder="Enter lead requirements...">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="text-end mb-3">
                <button type="reset" class="btn btn-secondary"> Reset </button>
                <button type="submit" class="btn btn-primary"> Create Lead </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');
        if (!startDate || !endDate) {
            return;
        }
        startDate.addEventListener('change', function() {
            if (!this.value) {
                endDate.value = '';
                return;
            }
            endDate.min = this.value;
            const date = new Date(this.value + 'T00:00:00');
            date.setDate(date.getDate() + 1);
            const year = date.getFullYear();
            const month = String(
                date.getMonth() + 1
            ).padStart(2, '0');
            const day = String(
                date.getDate()
            ).padStart(2, '0');
            endDate.value =
                `${year}-${month}-${day}`;

        });
    });
</script>
