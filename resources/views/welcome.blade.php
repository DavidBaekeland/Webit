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

        <section class="auctionsCards" id="auctions">
            @foreach($auctions as $auction)
                <x-card :auction="$auction"></x-card>
            @endforeach
        </section>

        <section id="aboutSection">
            <h1 class="center">Over Ons</h1>
            <div class="card">
                <h2>Web Luxury</h2>
                <p>
                    Welkom bij Web Luxury, waar we de wereld van exclusieve veilingen tot leven
                    brengen. Bij Web Luxury geloven we dat luxe meer is dan alleen materiële
                    bezittingen - het is een ervaring, een levensstijl en een manier om jezelf uit te
                    drukken. Onze missie is om een verfijnde en meeslepende online omgeving te
                    creëren waar gepassioneerde verzamelaars en liefhebbers van fijne zaken
                    samenkomen om unieke stukken te ontdekken en te bemachtigen.
                </p>
            </div>
        </section>

        <section id="uniqueProductsSection">
            <h1 class="center">Zeldzame items</h1>
            <div>
                @foreach($uniqueProducts as $uniqueProduct)
                    <a href="{{ route('product', [$uniqueProduct->auction->slug, $uniqueProduct]) }}"" class="uniqueProductsLinks">
                        <img src="{{ asset('storage/auctions/'.$uniqueProduct->auction->slug.'/'.$uniqueProduct->slug.'/'.$uniqueProduct->imageFirst()) }}" alt="Boot" srcset="">
                    </a>
                @endforeach
            </div>

        </section>

        <section id="contact">
            <h1 class="center">Contact</h1>

            <form id="contactForm" action="{{ route("contact") }}" method="post" class="card">
                @csrf

                @if(\Illuminate\Support\Facades\Session::has('succes'))
                    <p>{{\Illuminate\Support\Facades\Session::get('succes')}}</p>
                @endif

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
                    <input id="name" type="text" name="name" placeholder="Naam"  value="{{ old('name') }}">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="email"  value="{{ old('email') }}">
                </div>

                <div>
                    <label for="message">Bericht</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Typ uw bericht">@if(old('message')){{ old('message') }}@endif</textarea>
                </div>

                <button type="submit">Contact</button>

            </form>

        </section>


        <footer>
            <img src="https://www.webit.be/wp-content/themes/webit/images/beeldmerk.png" alt="logo" srcset="">

            <div>
                <a href="https://goo.gl/maps/tjDB3bk5BtxHGCts8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>

                    Vlaamsekaai 11
                    2000 Antwerpen
                </a>

                <a href="telto:+32468230355">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>

                    +32 (0)468 23 03 55
                </a>

                <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>

                    {{env('MAIL_FROM_ADDRESS')}}
                </a>
            </div>

            <div>
                <a href="#auctions">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>

                    Veilingen
                </a>

                <a href="#aboutSection">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    Over ons
                </a>

                <a href="#uniqueProductsSection">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                    Zeldzame items
                </a>

                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>

                    Contact
                </a>
            </div>

            <div>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                    </svg>

                    {{Lang::locale()}}
                </a>
            </div>
        </footer>
    </body>
</html>
