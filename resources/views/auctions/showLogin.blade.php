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

    <a href="{{ route('product.create', $auction) }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </a>

    @if(\Illuminate\Support\Facades\Session::has('succes'))
        <p>{{\Illuminate\Support\Facades\Session::get('succes')}}</p>
    @endif

    <div class="productsCards">
        @foreach($products as $product)
            <div>
                <form action="{{ route('product.delete') }}" method="post">
                    @csrf
                    @method('delete')

                    <input type="hidden" name="product" value="{{ $product->slug }}">

                    <button type="submit" class="productDelete">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </form>
                <x-card-small :product="$product"></x-card-small>
            </div>
        @endforeach
    </div>
</body>
</html>
