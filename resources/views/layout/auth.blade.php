<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact CRM</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-gray-200">
    <main>
        <div class="flex justify-center mt-10">
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/alpine.min.js')}}" defer></script>
</body>
</html>