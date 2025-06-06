<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="svg" href="{{ asset('/images/logo/favicon.svg') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{ $title }}</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <main>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <section class="py-4 md:py-0">
                    <div class="flex flex-col items-center justify-center md:px-6 md:py-8 mx-auto md:h-screen lg:py-10">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </main>
    </div>

</body>

</html>
