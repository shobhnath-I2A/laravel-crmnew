@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <h4>Email Details</h4>

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
                <td>{!! $emailLog->message !!}</td>
            </tr>

        </table>

    </div>
</div>

@endsection
