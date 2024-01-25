@extends('template.template')

@section('title')
    <title>Home Page</title>
@endsection

@section('head')
@endsection

@section('authButton')
@endsection

@section('content')

    <div class="p-4">
        <div>
            <p class="text-decoration-underline fw-bold">{{ $user->firstName }} {{ $user->lastName }}</p>

            <form class="d-flex flex-column w-25 gap-4" method="POST" action="{{ route('updateUser', $user->id) }}">
                @csrf
                @method('PUT')
                <label for="role">Role:</label>
                <select name="role" id="role" class="text-center">
                    <option value="Admin" {{ $user->role == "Admin" ? 'selected' : '' }}>Admin</option>
                    <option value="Customer" {{ $user->role == "Customer" ? 'selected' : '' }}>Customer</option>
                </select>
                <button class="btn btn-warning fw-bold">Save</button>
            </form>
        </div>
    </div>

@endsection
