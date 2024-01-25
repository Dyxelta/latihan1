@extends('template.template')

@section('title')
    <title>Register Page</title>
@endsection

@section('head')

@endsection

@section('authButton')

@endsection

@section('content')

    <div>
        <div>
            <h1>Register</h1>
        </div>

        <form class="d-flex flex-column align-items-center justify-content-center gap-4 w-100 mb-4" action="{{ route('registerAccount') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="d-flex flex-row gap-4 w-75 px-4 py-2">
                <div class="d-flex flex-column gap-2 w-100">
                    <label for="first_name">{{ __('form.fname') }}</label>
                    <input class="w-100" type="text" name="first_name" id="first_name">
                    @error('first_name')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="email">{{ __('form.email') }}</label>
                    <input type="email" name="email" id="email">
                    @error('email')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="gender">Gender</label>
                    <div>
                        <input type="radio" name="gender" id="male" value="Male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female">
                        <label for="female">Female</label>
                    </div>
                    @error('gender')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    @error('password')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex flex-column gap-2 w-100">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name">
                    @error('last_name')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="role">Role</label>
                    <select class="" name="role" id="role">
                        <option value="" disabled selected></option>
                        <option value="Admin">Admin</option>
                        <option value="Customer">Customer</option>
                    </select>
                    @error('role')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="picture">Display Picture</label>
                    <input type="file" name="picture" id="picture">
                    @error('picture')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="confirm_pass">Confirm Password</label>
                    <input type="password" name="confirm_pass" id="confirm_pass">
                    @error('confirm_pass')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button>Submit</button>
        </form>

        <div class="d-flex align-items-center justify-content-center mb-4">
            <a href="{{ route('login') }}">Already have an account? click here to log in</a>
        </div>

    </div>

@endsection
