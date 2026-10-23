<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure payment</title>
    <style>
        body { font: 16px Arial, sans-serif; color: #263244; background: #f4f6f9; margin: 0; padding: 24px; }
        .payment-card { max-width: 520px; margin: 8vh auto; padding: 28px; background: #fff; border-radius: 8px; box-shadow: 0 3px 18px #0001; }
        .amount { font-size: 30px; font-weight: 700; margin: 12px 0; }
        .pay-button { border: 0; border-radius: 4px; padding: 12px 22px; color: #fff; background: #005ee2; font-size: 16px; cursor: pointer; }
    </style>
</head>

<body>
    <main class="payment-card">
        <h1>Secure payment</h1>
        <p>Invoice INV-{{ $schedule->invoice->id }}</p>
        <p>Payment due {{ $schedule->due_on->format('d M Y') }}</p>
        <div class="amount">
            {{ $schedule->invoice->currency }}
            {{ number_format(($schedule->amount_minor + $schedule->convenience_fee_minor) / 100, 2) }}
        </div>
        @if (session('success'))
            <p role="status">{{ session('success') }}</p>
        @elseif (session('error'))
            <p role="alert">{{ session('error') }}</p>
            <button type="button" class="pay-button" id="checkout">Retry payment</button>
        @else
            <button type="button" class="pay-button" id="checkout">Pay securely</button>
        @endif
    </main>

    <form id="verify-payment" method="POST" action="{{ route('query-payment.verify', ['token' => $token]) }}">
        @csrf
        <input type="hidden" name="razorpay_payment_id">
        <input type="hidden" name="razorpay_order_id">
        <input type="hidden" name="razorpay_signature">
    </form>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('checkout')?.addEventListener('click', function () {
            const checkout = new Razorpay({
                key: @json($credentials['api_key']),
                order_id: @json($schedule->razorpay_order_id),
                amount: {{ $schedule->amount_minor + $schedule->convenience_fee_minor }},
                currency: @json($schedule->invoice->currency),
                name: 'Invoice INV-{{ $schedule->invoice->id }}',
                description: 'Scheduled invoice payment',
                handler: function (response) {
                    const form = document.getElementById('verify-payment');
                    form.elements.razorpay_payment_id.value = response.razorpay_payment_id;
                    form.elements.razorpay_order_id.value = response.razorpay_order_id;
                    form.elements.razorpay_signature.value = response.razorpay_signature;
                    form.submit();
                }
            });
            checkout.open();
        });
    </script>
</body>

</html>
