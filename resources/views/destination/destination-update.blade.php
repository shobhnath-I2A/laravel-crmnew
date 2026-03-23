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
        max-width: 90%;
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
<div class="modal-body">
    <h4 style="margin-bottom:10px; font-weight:600;">Add Destination</h4>
    @if (isset($activityRate))
        <form class="custom-validation ajax-form" method="POST"
            action="{{ route('destinations.update', $activityRate->id) }}">
            @method('PUT')
        @else
            <form class="custom-validation ajax-form" method="POST" action="{{ route('destinations.store') }}">
    @endif
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="validationCustom02">Name<span class="redmtext">*</span> </label>
                    <input type="text" class="form-control" required="" name="name" value="" aria-required="true">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
            onclick="this.form.submit(); this.disabled=true; this.value='Saving...';">
    </div>
    </form>
</div>
