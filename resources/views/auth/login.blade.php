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

        <div class="productsCards">
            <form action="{{ route('login') }}" method="post" class="card" id="loginForm">
                @csrf

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}">
                </div>

                <div>
                    <label for="email">Password</label>
                    <input id="password" type="password" name="password" placeholder="wachtwoord" value="{{ old('password') }}">
                </div>

                <button type="submit">LOGIN</button>
            </form>
        </div>
    </body>
</html>
