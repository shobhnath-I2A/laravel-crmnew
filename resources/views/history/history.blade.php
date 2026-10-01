<div class="card-body"><h4>Query history</h4>
<table class="table table-bordered"><thead><tr><th>Event</th><th>Comment</th><th>Staff</th><th>Date</th></tr></thead><tbody>
@forelse($query->history as $event)
<tr><td>{{ $event->details }}</td><td>{{ $event->status_comment }}</td><td>{{ $event->author?->name ?? 'Former staff' }}</td><td>{{ $event->date_added?->format('d-m-Y H:i') }}</td></tr>
@empty<tr><td colspan="4">No recorded history. Historical events cannot be reconstructed from the former sample page.</td></tr>@endforelse
</tbody></table>{{ $query->history->links() }}</div>
