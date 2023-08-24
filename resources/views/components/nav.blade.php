<nav>
    <a href="{{ url('/') }}"><img src="https://www.webit.be/wp-content/themes/webit/images/beeldmerk.png" alt="logo" srcset=""></a>
    <div>
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>

</nav>
