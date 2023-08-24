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
        <x-nav/>

        <div class="productsCards">
            @foreach($products as $product)
                <x-card-small :product="$product"></x-card-small>
            @endforeach
        </div>
    </body>
</html>
