<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFlos</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        @include('layouts.nav')
    </div>
    <div>
        @include('layouts.sidebar')
    </div>
    <div>
        @yield('content')
    </div>

</body>
</html>
