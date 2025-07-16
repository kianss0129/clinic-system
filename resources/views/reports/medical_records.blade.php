{{-- resources/views/reports/medical_records.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Medical Records Report</title>
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

    <h1>Medical Records Report</h1>
    <p>Generated on: {{ now()->format('F j, Y g:i A') }}</p>

    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Diagnosis</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record->patient->name }}</td>
                    <td>{{ $record->doctor->name }}</td>
                    <td>{{ $record->diagnosis }}</td>
                    <td>{{ $record->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
