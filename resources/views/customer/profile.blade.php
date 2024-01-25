@extends('template.template')

@section('title')
    <title>Profile Page</title>
@endsection

@section('head')
@endsection

@section('authButton')
@endsection

@section('content')

    <div class="d-flex flex-row align-items-center justify-content-center p-4">
        <div class="w-25 d-flex align-items-center justify-content-center ">
            <img class="w-100" src="{{url('storage/' . $user->picture) }}" alt="">
        </div>

        <form class="d-flex flex-column align-items-center justify-content-center gap-4 w-100" action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="d-flex flex-row gap-4 w-100 px-4 py-2">
                <div class="d-flex flex-column gap-2 w-100">
                    <label for="first_name">First Name</label>
                    <input class="w-100" type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->firstName) }}">
                    @error('first_name')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="gender">Gender</label>
                    <div>
                        <input type="radio" name="gender" id="male" value="Male" {{ $user->gender == "Male" ? 'checked' : '' }}>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female" {{ $user->gender == "Female" ? 'checked' : '' }}>
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
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->lastName) }}">
                    @error('last_name')
                        <div class="alert-danger text-danger">{{ $message }}</div>
                    @enderror

                    <label for="role">Role</label>
                    <select class="" name="role" id="role" disabled >
                        <option value="Admin" {{ $user->role == "Admin" ? 'selected' : '' }}>Admin</option>
                        <option value="Customer" {{ $user->role == "Customer" ? 'selected' : '' }}>Customer</option>
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

            <button class="btn btn-warning">Save</button>
        </form>


    </div>

@endsection
