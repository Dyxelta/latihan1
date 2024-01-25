@extends('template.template')

@section('title')
    <title>Landing Page</title>
@endsection

@section('head')

@endsection

@section('authButton')

    <div class="position-absolute end-0 me-5 ">
        <a href="{{ route('register') }}">
            <button>
                Register
            </button>
        </a>

        <a href="{{ route('login') }}">
            <button>
                Login
            </button>
        </a>
    </div>

@endsection
