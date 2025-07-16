<!DOCTYPE html>
<html>
<head>
    <title>Appointment Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Appointment Report</h2>
    <table>
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $a)
            <tr>
                <td>{{ $a->patient->name }}</td>
                <td>{{ $a->doctor->name }}</td>
                <td>{{ $a->appointment_date }}</td>
                <td>{{ $a->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
