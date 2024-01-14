<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentalFLO</title>

    @vite('resources/css/app.css')
</head>
<body>
    @extends('layouts.mainLayout')
    @section('content')
        <div>
            <div>
                @include('layouts.sidebar')
            </div>
            <div>
                <!-- Include the content inside here -->
            </div>
        </div>


    @endsection

</body>
</html>
