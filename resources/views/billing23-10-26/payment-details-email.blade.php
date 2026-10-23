<p>Hello {{ $query->name ?: 'Customer' }},</p>
<p>Payment details for invoice INV-{{ $invoice->id }}:</p>
<p>Amount: {{ $invoice->currency }}
    {{ number_format(($schedule->amount_minor + $schedule->convenience_fee_minor) / 100, 2) }}<br>
    Due date: {{ $schedule->due_on->format('d M Y') }}</p>
@if ($bankInformation)
    <div>{!! nl2br(e($bankInformation)) !!}</div>
@else
    <p>Please contact us for bank transfer details.</p>
@endif
