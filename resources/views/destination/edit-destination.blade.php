<style>
    .crm-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .popup-box {
        position: relative;
        max-width: 400px;
        background: #fff;
        margin: 8% auto;
        border-radius: 5px;
        overflow: hidden;
    }

    .popup-box {
        transform: scale(0.9);
        transition: 0.3s ease;
    }

    .crm-popup.show .popup-box {
        transform: scale(1);
    }
</style>
<form class="custom-validation ajax-form"
      method="PUT"
      action="{{ route('destinations.update', $destination->id)}}">

    @csrf
        @method('PUT')


    <div class="modal-body">
        <div class="row">

            {{-- Name --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name <span class="redmtext">*</span></label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $destination->name ?? '') }}"
                           required>

                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Status --}}
            <div class="col-md-12">
                <div class="form-group">
                    <label>Status</label>

                    <input type="checkbox"
                           name="status"
                           value="1"
                           {{ old('status', $destination->status ?? 1) ? 'checked' : '' }}>
                    Active
                </div>
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
            {{ isset($destination) ? 'Update' : 'Save' }}
        </button>
    </div>
</form>
