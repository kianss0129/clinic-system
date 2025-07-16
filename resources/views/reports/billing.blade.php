{{-- resources/views/reports/billing.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Billing Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h1 {
            margin-bottom: 0;
        }
        p {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Billing Report</h1>
    <p>Generated on: {{ now()->format('F j, Y g:i A') }}</p>

    <table>
        <thead>
            <tr>
                <th>Invoice No</th>
                <th>Patient Name</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($billings as $billing)
                <tr>
                    <td>{{ $billing->invoice_no }}</td>
                    <td>{{ $billing->patient->name }}</td>
                    <td>₱{{ number_format($billing->amount, 2) }}</td>
                    <td>{{ $billing->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
