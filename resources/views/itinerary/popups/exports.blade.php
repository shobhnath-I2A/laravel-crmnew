<style>
    .popup-box {
        max-width: 30%;
    }
</style>
</div>
<div class="modal-content">
    <div class="modal-body" id="popcontent">
        <div style="padding:20px;">
            <a href="{{ route('itinerary-pdf.show', ['id' => $queryId]) }}" target="_blank" style="padding: 20px; font-size: 22px; font-weight: 700; display: block; margin-bottom: 10px; border: 2px dashed #8CFFDF; background-color: #EAFFFD; text-align: center; color: #333333; text-align: center; border-radius: 5px;">
                <i class="fa fa-file-pdf-o"></i> Export PDF</a>
        </div>
    </div>
</div>
