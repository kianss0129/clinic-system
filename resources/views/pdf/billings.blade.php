<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Billing Summary</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #000;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .paid {
            color: green;
            font-weight: bold;
        }
        .unpaid {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Billing Summary Report</h2>

    <table>
        <thead>
            <tr>
                <th>Invoice No</th>
                <th>Patient</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Billing Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($billings as $billing)
                <tr>
                    <td>{{ $billing->invoice_no }}</td>
                    <td>{{ $billing->patient->name ?? 'Unknown' }}</td>
                    <td>₱{{ number_format($billing->amount, 2) }}</td>
                    <td class="{{ strtolower($billing->status) }}">{{ $billing->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($billing->billing_date)->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No billing records available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
