<style>
    .popup-box {
        max-width: 35%;
    }
</style>

<div class="wrapper" style="margin-top: 0px; padding:15px;">
    <form action="{{ route('compose-email.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="query_id" value="{{ $queryId ?? '' }}">

    <div class="form-group">
        <label>To</label>
        <input type="email"
               name="to"
               class="form-control"
               value="{{ $email ?? '' }}"
               readonly>
    </div>

    <div class="form-group">
        <label>CC</label>
        <input type="text" class="form-control" name="cc">
    </div>

    <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" name="subject" required>
    </div>

    <div class="form-group">
        <label>Mail Body</label>
        <textarea id="editorclass" name="message" class="form-control editorclass" rows="6"></textarea>
    </div>

    <div class="form-group">
        <label>Attachment</label>
        <input type="file" name="attachment" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Send Mail
    </button>
</form>
</div>
