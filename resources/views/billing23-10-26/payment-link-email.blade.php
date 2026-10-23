<p>Hello {{ $query->name ?: 'Customer' }},</p>
<p>Your payment of {{ $invoice->currency }}
    {{ number_format(($schedule->amount_minor + $schedule->convenience_fee_minor) / 100, 2) }} is due on
    {{ $schedule->due_on->format('d M Y') }} for invoice INV-{{ $invoice->id }}.</p>
<p><a href="{{ $paymentUrl }}">Pay securely</a></p>
<p>If you have already paid, please disregard this message.</p>
