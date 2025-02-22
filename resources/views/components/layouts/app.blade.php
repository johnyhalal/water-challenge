<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daily Water Level</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" sizes="16x16"/>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-radial from-[#eceadd] to-[#ddcfbf]  dark:bg-black ">
    <div class="relative min-h-screen flex flex-col items-center justify-center">
        <div class="block p-6 text-center my-10">
            <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="/">Daily Water Level</a></h5>

            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
