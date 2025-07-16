{{-- resources/views/reports/appointments.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Appointments Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Appointments Report</h1>

    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Appointment Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
