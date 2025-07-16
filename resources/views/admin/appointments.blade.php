@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Appointments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Scheduled Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->scheduled_time }}</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
