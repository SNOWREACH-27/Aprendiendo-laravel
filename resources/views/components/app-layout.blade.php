<!DOCTYPE html>
<html lang="lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content={{ $contentInformation }}>
        <title>{{ $title }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <x-nav-bar>
            {{ $slot }}
        </x-nav-bar>
    </body>

</html>
