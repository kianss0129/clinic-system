<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Billing Notification</title>
</head>
<body>
    <h2>Hello {{ $billing->patient->name }},</h2>
    <p>You have a new billing record from the clinic:</p>
    <ul>
        <li><strong>Invoice #:</strong> {{ $billing->invoice_no }}</li>
        <li><strong>Amount:</strong> ₱{{ number_format($billing->amount, 2) }}</li>
        <li><strong>Status:</strong> {{ $billing->status }}</li>
        <li><strong>Date:</strong> {{ $billing->billing_date }}</li>
    </ul>
    <p>Thank you!</p>
</body>
</html>
