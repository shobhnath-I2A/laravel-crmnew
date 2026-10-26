{{-- <div style="height:30px;"></div> --}}
<div class="footerstripboxouter">
    <div class="leftar">
        @include('partials.online-users-popup')
    </div>
    <div class="righar">
        <a style="cursor:pointer;" onclick="openNotebookPopup(this)" title="Notebook">
            <i class="fa fa-sticky-note-o" aria-hidden="true"></i> &nbsp;<span>Notebook</span></a>
        <a style="cursor:pointer;" onclick="openfooterpop('footernotebook','Updates',this,'user_news_updates','500px','600px','96px','531px');" title="Notebook">
            <i class="fa fa-bullhorn" aria-hidden="true"></i> &nbsp;<span>Updates</span>
        </a>
        {{-- Night Mode --}}
        <a href="javascript:void(0);" id="nightThemeToggle" onclick="toggleNightTheme();" title="Night Theme" style="cursor:pointer;" > <i id="nightThemeIcon" class="fa fa-moon-o" aria-hidden="true" ></i> &nbsp; <span id="nightThemeText"> Night Theme Off </span> </a>
    </div>
</div>

<div id="notebook-popup-container"></div>

<script>
    const notebookIndexUrl = @json(route('notebook.index'));
    const notebookStoreUrl = @json(route('notebook.store'));
    const notebookCsrfToken = document.querySelector('meta[name="csrf-token"]').content;

    async function notebookRequest(url, options = {}) {
        const response = await fetch(url, {
            ...options,
            headers: {
                'X-CSRF-TOKEN': notebookCsrfToken,
                'Accept': 'application/json',
                ...(options.headers || {})
            }
        });
        const responseText = await response.text();
        let data;

        try {
            data = responseText ? JSON.parse(responseText) : {};
        } catch {
            throw new Error(responseText || response.statusText);
        }

        if (!response.ok) {
            throw new Error(data.message || 'Notebook request failed.');
        }

        return data;
    }

    function openNotebookPopup(link) {
        document.querySelectorAll('.footerstripboxouter a').forEach(function (item) {
            item.classList.remove('activefootertab');
        });
        link.classList.add('activefootertab');

        fetch(notebookIndexUrl, { headers: { 'Accept': 'text/html' } })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('Unable to load notebook notes.');
                }
                return response.text();
            })
            .then(function (html) {
                document.getElementById('notebook-popup-container').innerHTML = html;
                document.querySelectorAll('#notes-container .note-textarea').forEach(function (textarea) {
                    textarea.dataset.savedValue = textarea.value;
                });
            })
            .catch(function (error) {
                link.classList.remove('activefootertab');
                window.alert(error.message);
            });
    }

    function closeNotebookPopup() {
        document.getElementById('notebook-popup-container').innerHTML = '';
        document.querySelectorAll('.footerstripboxouter a').forEach(function (item) {
            item.classList.remove('activefootertab');
        });
    }

    function createNotebookNote(note) {
        const block = document.createElement('div');
        block.className = 'usernotes';
        block.id = 'note-block-' + note.id;

        const form = document.createElement('form');
        form.className = 'note-form';
        form.dataset.id = note.id;
        form.dataset.deleteUrl = note.delete_url;
        form.action = note.update_url;
        form.method = 'POST';

        const token = document.createElement('input');
        token.type = 'hidden';
        token.name = '_token';
        token.value = notebookCsrfToken;
        form.appendChild(token);

        const method = document.createElement('input');
        method.type = 'hidden';
        method.name = '_method';
        method.value = 'PUT';
        form.appendChild(method);

        const textarea = document.createElement('textarea');
        textarea.name = 'details';
        textarea.className = 'noteareawrite note-textarea';
        textarea.placeholder = 'Write here something...';
        textarea.value = note.details;
        textarea.dataset.savedValue = note.details;
        form.appendChild(textarea);

        const toolbar = document.createElement('div');
        toolbar.className = 'toolbarfoo';
        const deleteButton = document.createElement('a');
        deleteButton.className = 'btn-delete-note';
        deleteButton.title = 'Delete';
        deleteButton.innerHTML = '<i class="fa fa-trash" aria-hidden="true"></i>';
        toolbar.appendChild(deleteButton);
        form.appendChild(toolbar);
        block.appendChild(form);

        return block;
    }

    document.addEventListener('focusin', function (event) {
        if (event.target.matches('.note-textarea')) {
            event.target.style.minHeight = '180px';
            event.target.style.overflow = 'auto';
        }
    });

    document.addEventListener('focusout', async function (event) {
        const textarea = event.target;
        if (!textarea.matches('.note-textarea')) return;

        textarea.style.minHeight = '50px';
        textarea.style.overflow = 'hidden';
        if (textarea.value === textarea.dataset.savedValue) return;

        const form = textarea.closest('.note-form');
        try {
            await notebookRequest(form.action, {
                method: 'POST',
                body: new FormData(form)
            });
            textarea.dataset.savedValue = textarea.value;
        } catch (error) {
            window.alert(error.message);
        }
    });

    document.addEventListener('click', async function (event) {
        const addButton = event.target.closest('#btn-add-note');
        if (addButton) {
            event.preventDefault();
            if (addButton.dataset.pending) return;
            addButton.dataset.pending = 'true';

            try {
                const note = await notebookRequest(notebookStoreUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8' },
                    body: new URLSearchParams({ details: '' })
                });
                const container = document.getElementById('notes-container');
                container.querySelector('.no-notes-msg')?.remove();
                container.prepend(createNotebookNote(note.data));
                container.querySelector('.note-textarea').focus();
            } catch (error) {
                window.alert(error.message);
            } finally {
                delete addButton.dataset.pending;
            }
            return;
        }

        const deleteButton = event.target.closest('.btn-delete-note');
        if (!deleteButton) return;

        event.preventDefault();
        const form = deleteButton.closest('.note-form');
        if (!window.confirm('Are you sure you want to delete this note?')) return;

        try {
            await notebookRequest(form.dataset.deleteUrl, { method: 'DELETE' });
            const block = form.closest('.usernotes');
            const container = block.parentElement;
            block.remove();
            if (!container.querySelector('.usernotes')) {
                const emptyMessage = document.createElement('div');
                emptyMessage.className = 'no-notes-msg';
                emptyMessage.style.cssText = 'text-align:center; padding:20px; color:#888;';
                emptyMessage.textContent = 'No notes found. Create one!';
                container.appendChild(emptyMessage);
            }
        } catch (error) {
            window.alert(error.message);
        }
    });
</script>

@include('followups.task-reminder')
