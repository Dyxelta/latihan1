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

<body class="vh-100 w-100 ">

    <header>
        <div class="d-flex flex-row justify-content-between align-items-center px-4 py-2 bg-success ">
            <div>
                <h1>Amazing Grocery</h1>
            </div>
            @yield('authButton')
        </div>
    </header>

    @auth

    @endauth

    @yield('content')

    <footer class="w-100 d-flex flex-row align-items-center justify-content-center bg-success ">
        <p class="m-0 py-2"><span class="border border-1 border-black rounded-circle px-1">C</span>Amazing E-Grocery 2023</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
