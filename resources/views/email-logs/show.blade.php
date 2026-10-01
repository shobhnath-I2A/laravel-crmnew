@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <h4>Email Details</h4>
        @if($emailLog->attachment)<p><a href="{{ route('email-logs.attachment', $emailLog->id) }}">Download attachment</a></p>@endif

        <table class="table table-bordered">

            <tr>
                <th width="200">From</th>
                <td>{{ $emailLog->from_email }}</td>
            </tr>

            <tr>
                <th>To</th>
                <td>{{ $emailLog->to_email }}</td>
            </tr>

            <tr>
                <th>Subject</th>
                <td>{{ $emailLog->subject }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ ucfirst($emailLog->status) }}</td>
            </tr>

            <tr>
                <th>Error</th>
                <td>{{ $emailLog->error_message }}</td>
            </tr>

            <tr>
                <th>Message</th>
                <td><iframe title="Email message" sandbox="" referrerpolicy="no-referrer" style="width:100%;min-height:350px;border:0" srcdoc="{{ '<meta http-equiv="Content-Security-Policy" content="default-src &#39;none&#39;; style-src &#39;unsafe-inline&#39;; img-src data:">' . $emailLog->message }}"></iframe></td>
            </tr>

        </table>

    </div>
</div>

@endsection
