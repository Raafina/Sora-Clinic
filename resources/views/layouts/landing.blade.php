<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none
        }
    </style>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/scripts.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="svg" href="{{ asset('/images/logo/favicon.svg') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{ $title }}</title>
</head>

<body class="text-poppins">
    <div class="min-h-full w-full relative">
        <x-navbar></x-navbar>
        <main>
            {{ $slot }}
        </main>
        <x-footer-landing></x-footer-landing>
    </div>

</body>

</html>
