<div class="footerpopboxs" id="footernotebook" style="width: 374px; min-height: 488px; right: 0px;">
  <div class="footerpopboxsheader">
    <span>Notebook</span>
    <i class="fa fa-times" aria-hidden="true" onclick="closeNotebookPopup();"></i>
  </div>
  <div class="popcontentbodybox" style="height: 531px;">
    <div class="addnotebookouter">
      <a class="notebookadd" title="Add New Note" id="btn-add-note">
        <i class="fa fa-plus-square" aria-hidden="true"></i>
      </a>
    </div>
    <div class="usernotesouter" id="notes-container">
      @forelse($notes as $note)
        <div class="usernotes" id="note-block-{{ $note->id }}">
          <form class="note-form" data-id="{{ $note->id }}" data-delete-url="{{ route('notebook.destroy', $note->id) }}" action="{{ route('notebook.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <textarea name="details" class="noteareawrite note-textarea" placeholder="Write here something...">{{ $note->details }}</textarea>

            <div class="toolbarfoo">
              <a title="Delete" class="btn-delete-note" data-id="{{ $note->id }}">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
            </div>
          </form>
        </div>
      @empty
        <div class="no-notes-msg" style="text-align:center; padding:20px; color:#888;">No notes found. Create one!</div>
      @endforelse
    </div>
  </div>
</div>
