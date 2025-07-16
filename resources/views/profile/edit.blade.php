@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        {{-- fields … --}}
    </form>

    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
