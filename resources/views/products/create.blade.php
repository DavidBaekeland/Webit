<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Web Luxury') }}</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <img src="https://www.webit.be/wp-content/themes/webit/images/beeldmerk.png" alt="logo" srcset="">
    </nav>

    <div class="productsCards">
        <form action="{{ route('product.store', $auction) }}" method="post" class="card" id="loginForm" enctype="multipart/form-data">
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
                <label for="name">Naam</label>
                <input id="name" type="text" name="name" placeholder="naam" value="{{ old('name') }}">
            </div>
            <div>
                <label for="end_date">Eind datum</label>
                <input id="end_date" type="datetime-local" name="end_date" value="{{ old('end_date') }}">
            </div>
            <div>
                <label for="start_valuation">Start waarde van schatting</label>
                <input id="start_valuation" type="number" name="start_valuation" placeholder="€0" value="{{ old('start_valuation') }}">
            </div>

            <div>
                <label for="end_valuation">Eind waarde van schatting</label>
                <input id="end_valuation" type="number" name="end_valuation" placeholder="€300" value="{{ old('end_valuation') }}">
            </div>

            <div>
                <label for="images">Foto's (meerdere mogelijk)</label>
                <input type="file" name="images[]" id="images" multiple accept="image/*">
            </div>

            <button type="submit">TOEVOEGEN</button>
        </form>
    </div>
</body>
</html>
