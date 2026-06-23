
@php
    $price = $item->price;
@endphp

<style>
    .popup-box {
        max-width: 40%;
    }
</style>

<div class="modal-body">
    <form class="ajax-form"
          action="{{ route('pricing.update', $item->id) }}"
          method="POST">

        @csrf

        <div class="row">

            @if($item->type == 'transportation')

                <div class="col-md-12">
                    <div class="form-group">
                        <label>No. of Vehicle</label>
                        <input name="vehicle"
                               type="number"
                               min="1"
                               class="form-control calculate-price"
                               value="{{ $price->vehicle ?? 1 }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Per Vehicle Cost</label>
                        <input name="vehicle_cost"
                               type="number"
                               min="0"
                               class="form-control calculate-price"
                               value="{{ $price->vehicle_cost ?? 0 }}">
                    </div>
                </div>

            @elseif($item->type == 'accommodation')

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Per Single Room Cost</label>
                        <input name="single_room_cost"
                               type="number"
                               min="0"
                               class="form-control calculate-price"
                               value="{{ $price->single_room_cost ?? 0 }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Per Double Room Cost</label>
                        <input name="double_room_cost"
                               type="number"
                               min="0"
                               class="form-control calculate-price"
                               value="{{ $price->double_room_cost ?? 0 }}">
                    </div>
                </div>

            @else

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Per Adult Cost</label>
                        <input name="adult_cost"
                               type="number"
                               min="0"
                               class="form-control calculate-price"
                               value="{{ $price->adult_cost ?? 0 }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Per Child Cost</label>
                        <input name="child_cost"
                               type="number"
                               min="0"
                               class="form-control calculate-price"
                               value="{{ $price->child_cost ?? 0 }}">
                    </div>
                </div>

            @endif

            <div class="col-md-12">
                <div class="form-group">
                    <label>Markup %</label>
                    <input name="markup"
                           type="number"
                           min="0"
                           class="form-control calculate-price"
                           value="{{ $price->markup ?? 0 }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Total Price</label>
                    <input name="total_price"
                           type="number"
                           class="form-control"
                           value="{{ $price->total_price ?? 0 }}"
                           readonly>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Final Price</label>
                    <input name="final_price"
                           type="number"
                           class="form-control"
                           value="{{ $price->final_price ?? 0 }}"
                           readonly>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="savingbutton">
                Save
            </button>
        </div>
    </form>
</div>
<script>
$(document).on('keyup change', '.calculate-price', function () {

    let form = $(this).closest('form');

    let vehicle = parseFloat(form.find('[name="vehicle"]').val()) || 0;
    let vehicleCost = parseFloat(form.find('[name="vehicle_cost"]').val()) || 0;

    let adultCost = parseFloat(form.find('[name="adult_cost"]').val()) || 0;
    let childCost = parseFloat(form.find('[name="child_cost"]').val()) || 0;

    let singleRoom = parseFloat(form.find('[name="single_room_cost"]').val()) || 0;
    let doubleRoom = parseFloat(form.find('[name="double_room_cost"]').val()) || 0;

    let markup = parseFloat(form.find('[name="markup"]').val()) || 0;

    let total = 0;

    if (vehicle > 0 && vehicleCost > 0) {
        total = vehicle * vehicleCost;
    } else if (singleRoom > 0 || doubleRoom > 0) {
        total = singleRoom + doubleRoom;
    } else {
        total = adultCost + childCost;
    }

    let finalPrice = total + ((total * markup) / 100);

    form.find('[name="total_price"]').val(total.toFixed(2));
    form.find('[name="final_price"]').val(finalPrice.toFixed(2));
});
</script>
{{-- <style>
    .popup-box {
        max-width: 40%;
    }
</style>
<div class="modal-body">
    <form class="custom-validation" action="frmaction.html" target="actoinfrm" novalidate="" method="post"
        enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom02">No. of Vehicle</label>
                        <input name="vehicle" type="number" min="1" class="form-control" value="11">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom02">Per Vehicle Cost</label>
                        <input name="adultCost" type="number" min="0" class="form-control" value="2001">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="validationCustom02">Markup %</label>
                        <input name="markupPercent" type="number" min="0" class="form-control"
                            id="markupPercent" value="10">
                    </div>
                </div>

            </div>
        </div>

        <div class="modal-footer" style=" position:relative;">
            <input name="Save" type="submit" value="Save" id="savingbutton" class="btn btn-primary"
                onclick="this.form.submit(); this.disabled=true; this.value='Saving...';" style="float:right;">
        </div>
    </form>
</div> --}}
