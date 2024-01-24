@extends('template.template')

@section('title')
    <title>Login Page</title>
@endsection

@section('head')

@endsection

@section('authButton')

@endsection

@section('content')

@if(session()->has('error'))
<script>
    alert('{{ session('error') }}')
</script>
@endif

<div>
    <h1>Login</h1>
</div>

<form class="d-flex flex-column align-items-start justify-content-center gap-4 w-50 mb-4" action="{{ route('loginAccount') }}" method="POST">
    @csrf

    <div class="d-flex flex-row gap-4 w-100 px-4 py-2">
        <div class="d-flex flex-column gap-2 w-100">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            @error('email')
                <div class="alert-danger text-danger">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            @error('password')
                <div class="alert-danger text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="d-flex justify-content-center w-100">
        <button>Submit</button>
    </div>
</form>

<div class="d-flex align-items-center justify-content-center mb-4 w-50">
    <a href="{{ route('register') }}">Don't have an account? click here to sign up</a>
</div>
@endsection
