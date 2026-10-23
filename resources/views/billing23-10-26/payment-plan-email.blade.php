<p>Hello {{ $query->name ?: 'Customer' }},</p>
<p>Here is the payment plan for invoice INV-{{ $invoice->id }} ({{ $invoice->currency }} {{ number_format($invoice->amount_minor / 100, 2) }}).</p>
<table style="border-collapse:collapse;width:100%" border="1" cellpadding="8">
    <thead>
        <tr>
            <th align="left">Due date</th>
            <th align="left">Amount</th>
            <th align="left">Convenience fee</th>
            <th align="left">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($invoice->schedules as $schedule)
            <tr>
                <td>{{ $schedule->due_on->format('d M Y') }}</td>
                <td>{{ $invoice->currency }} {{ number_format($schedule->amount_minor / 100, 2) }}</td>
                <td>{{ $invoice->currency }} {{ number_format($schedule->convenience_fee_minor / 100, 2) }}</td>
                <td>{{ ucfirst($schedule->status) }}</td>
            </tr>
        @empty
            <tr><td colspan="4">No installments have been scheduled.</td></tr>
        @endforelse
    </tbody>
</table>
