<div style="padding:15px; background:#fff; border:1px solid #ddd;">

    <h5>Create {{ $eventsection }}</h5>

    <form id="eventForm">

        <input type="hidden" name="type" value="{{ strtolower($eventsection) }}">
        <input type="hidden" name="day" value="{{ $day }}">
        <input type="hidden" name="destination_id" value="{{ $destinationId }}">
        <input type="hidden" name="date" value="{{ $date }}">

        @if($eventsection == 'Accommodation')

            <div class="form-group">
                <label>Hotel Name</label>
                <input type="text" name="hotel_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Room Type</label>
                <input type="text" name="room_type" class="form-control">
            </div>

        @elseif($eventsection == 'Activity')

            <div class="form-group">
                <label>Activity Name</label>
                <input type="text" name="title" class="form-control">
            </div>

        @endif

        <button type="button" onclick="saveEvent()" class="btn btn-primary">
            Save
        </button>

    </form>

</div>
