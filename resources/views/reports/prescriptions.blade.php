{{-- resources/views/reports/prescriptions.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Prescriptions Report</title>
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

    <h1>Prescriptions Report</h1>
    <p>Generated on: {{ now()->format('F j, Y g:i A') }}</p>

    <table>
        <thead>
            <tr>
                <th>Medical Record ID</th>
                <th>Medicine Name</th>
                <th>Dosage</th>
                <th>Instructions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prescriptions as $prescription)
                <tr>
                    <td>{{ $prescription->medical_record_id }}</td>
                    <td>{{ $prescription->medicine_name }}</td>
                    <td>{{ $prescription->dosage }}</td>
                    <td>{{ $prescription->instructions }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
