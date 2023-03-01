<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/70ea7e4323.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Courier+Prime&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body class="h-screen">
    <x-nav />
    @if (session()->has('success'))
        <div class="md:flex md:justify-center md:items-center">
            <p class="text-xs font-bold uppercase border border-green-700 rounded px-4 py-2">
                {{ session()->get('success') }}
            </p>
        </div>
    @elseif (session()->has('error'))
        <div class="md:flex md:justify-center md:items-center">
            <p class="text-xs font-bold uppercase border border-red-700 rounded px-4 py-2">
                {{ session()->get('error') }}
            </p>
        </div>
    @endif
    {{ $content }}
    <x-footer />
</body>

</html>
