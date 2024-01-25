<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('title')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @yield('head')
</head>

<body class="d-flex flex-column min-vh-100 w-100 ">

    <header>
        <div class=" position-relative d-flex flex-row justify-content-between align-items-center px-4 py-3 bg-success ">
            <div class="d-flex justify-content-center align-items-center w-100">
                <h1 class="m-0">Amazing Grocery</h1>
            </div>
            @yield('authButton')
            @auth
                @if (auth()->user()->role == "Admin" || auth()->user()->role == "Customer")
                    <div class="position-absolute end-0 me-5 ">
                        <a href="{{ route('logout') }}">
                            <button class="btn btn-warning py-0 px-2 ">Log Out</button>
                        </a>
                    </div>
                @endif
            @endauth
        </div>
    </header>

    @auth
        <div class="bg-warning py-2">
            <ul class="d-flex flex-row align-items-center justify-content-evenly m-0">
                <li class="list-unstyled"><a href="{{ route('home') }}" class="text-decoration-none text-black fw-bold">Home</a></li>
                <li class="list-unstyled"><a href="{{ route('cart') }}" class="text-decoration-none text-black fw-bold">Cart</a></li>
                <li class="list-unstyled"><a href="{{ route('profile') }}" class="text-decoration-none text-black fw-bold">Profile</a></li>
                @if (auth()->user()->role == "Admin")
                    <li class="list-unstyled"><a href="{{ route('account') }}" class="text-decoration-none text-black fw-bold">Account Maintenance</a></li>
                @endif
            </ul>
        </div>
    @endauth

    @yield('content')

    <footer class="w-100 d-flex flex-row align-items-center justify-content-center bg-success mt-auto">
        <p class="m-0 py-2">&copy; Amazing E-Grocery 2023</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
