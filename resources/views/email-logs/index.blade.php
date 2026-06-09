@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <h4>Email Logs</h4>

        <form method="GET" class="mb-3">
            <input type="text"
                   name="keyword"
                   class="form-control"
                   placeholder="Search Email / Subject"
                   value="{{ request('keyword') }}">
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>To Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Sent By</th>
                    <th>Date</th>
                    <th width="120">Action</th>
                </tr>
            </thead>

            <tbody>

            @forelse($emailLogs as $log)

                <tr>
                    <td>{{ $log->id }}</td>

                    <td>{{ $log->to_email }}</td>

                    <td>{{ $log->subject }}</td>

                    <td>
                        @if($log->status == 'sent')
                            <span class="badge bg-success">Sent</span>
                        @elseif($log->status == 'failed')
                            <span class="badge bg-danger">Failed</span>
                        @else
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>

                    <td>
                        {{ $log->user->name ?? '-' }}
                    </td>

                    <td>
                        {{ $log->created_at->format('d M Y h:i A') }}
                    </td>

                    <td>
                        <a href="{{ route('email-logs.show',$log->id) }}"
                           class="btn btn-sm btn-primary">
                            View
                        </a>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        No Email Logs Found
                    </td>
                </tr>

            @endforelse

            </tbody>
        </table>

        {{ $emailLogs->links() }}

    </div>
</div>

@endsection
