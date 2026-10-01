<div class="card-body"><h4>Guests ({{ $query->guests->count() }})</h4>
<button type="button" class="btn btn-primary mb-3" onclick="openPopup('Add Guest', '{{ route('query-guests.index', ['query_id' => $query->id]) }}')">Add Guest</button>
<table class="table table-bordered"><thead><tr><th>Name</th><th>Gender</th><th>Date of birth</th><th>Documents</th><th>Action</th></tr></thead><tbody>
@forelse($query->guests as $guest)
<tr><td>{{ $guest->title }} {{ $guest->first_name }} {{ $guest->last_name }}</td><td>{{ $guest->gender }}</td><td>{{ $guest->dob }}</td>
<td>@foreach($guest->documents as $document)<a class="d-block" href="{{ route('query-workflow.document.download', [$query->id, $document->id]) }}">{{ $document->label }}</a>@endforeach
<form action="{{ route('query-workflow.document', $query->id) }}" method="post" enctype="multipart/form-data">@csrf
<input type="hidden" name="guest_id" value="{{ $guest->id }}"><label>Document label<input class="form-control" name="label" maxlength="100" required></label>
<label>PDF or image, up to 10 MB<input class="form-control" type="file" name="document" accept=".pdf,.jpg,.jpeg,.png" required></label><button class="btn btn-sm btn-primary">Upload</button></form></td>
<td><button type="button" class="btn btn-sm btn-light" onclick="openPopup('Edit Guest', '{{ route('query-guests.index', ['query_id' => $query->id, 'edit_id' => $guest->id]) }}')">Edit</button>@if($guest->documents->isEmpty())<form action="{{ route('query-guests.destroy', $guest->id) }}" method="post">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Remove guest</button></form>@else Documents retained @endif</td></tr>
@empty<tr><td colspan="5">No guests added.</td></tr>@endforelse
</tbody></table></div>
