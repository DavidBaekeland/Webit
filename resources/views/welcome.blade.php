<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Web Luxury') }}</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <nav>
            <img src="https://www.webit.be/wp-content/themes/webit/images/beeldmerk.png" alt="logo" srcset="">
        </nav>

        <div class="auctionsCards">
            @foreach($auctions as $auction)
                <x-card :auction="$auction"></x-card>
            @endforeach
        </div>
    </body>
</html>
