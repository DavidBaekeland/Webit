<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Web Luxury') }}</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        @vite(['resources/css/app.css', 'resources/css/product.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <nav>
            <img src="https://www.webit.be/wp-content/themes/webit/images/beeldmerk.png" alt="logo" srcset="">
        </nav>

        <div id="product">
            <div class="productInfo">
                <h1>{{ $product->name }}</h1>

                <div class="imagesProduct">
                    @foreach($product->images as $image)
                        <img src="{{ asset('storage/auctions/'.$auction->slug.'/'.$product->slug.'/'.$image->image) }}" alt="Boot" srcset="">
                    @endforeach
                </div>

                <div id="info" class="card">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        {{$product->name}}
                    </p>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        Schatting: €{{$product->valuation}}
                    </p>

                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        Minimum: €{{$product->start_valuation}}
                    </p>
                </div>
            </div>

            <div id="offerCard" class="card">
                <div id="higestOfferDiv">
                    @if($product->higestOffer)
                        <h3>Hoogste bod</h3>
                        <h2 id="higestOffer">{{$product->higestOffer->offer}}</h2>
                    @else
                        <h2 id="higestOffer">0 biedingen</h2>

                    @endif
                </div>


                    @if(\Illuminate\Support\Facades\Session::has('succes'))
                       <p>{{\Illuminate\Support\Facades\Session::get('succes')}}</p>
                    @endif

                    <form id="offerForm" action="{{ route("product.offer", ["auction" => $auction, "product" => $product]) }}" method="post">
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

                        <div id="offerInput">
                            <input id="offer" type="number" name="offer" placeholder="offer" value="{{ old('offer') }}">
                            <input id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}">
                        </div>

                        <button type="submit">BIEDEN</button>
                    </form>
            </div>
        </div>


    </body>
</html>
