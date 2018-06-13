
<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link" href="/">Pagrindinis</a>
            <!--
            <a class="nav-link active" href="#">New features</a>
            <a class="nav-link" href="#">Press</a>
            <a class="nav-link" href="#">New hires</a>
            -->
            <a class="nav-link ml" href="{{ route('about') }}">Apie</a>

            @if (Route::has('login'))

                    @auth
                    <a class="nav-link mr-auto" href="{{ url('/posts/create') }}"><strong>Kurti skelbimą</strong></a>
                        <a class="nav-link ml" href="{{ url('/user/'.Auth::User()->nickname.'/saved') }}">Išsaugoti skelbimai</a>
                        <a class="nav-link ml" href="{{ url('/home') }}">Mano paskyra</a>
                        <a class="nav-link ml" href="{{ route('logout') }}">Atsijungti</a>
                    @else
                        <a class="nav-link ml" href="{{ route('login') }}">Prisijungti</a>
                        <a class="nav-link ml" href="{{ route('register') }}">Užsiregistruoti</a>
                    @endauth

            @endif

<!--
            @if(Auth::check())
                <a class="nav-link ml-auto" href="#"> {{ Auth::User()->name }}</a>
            @else
                <div class="nav-link ml-auto" > Guest </div>
            @endif
-->




        </nav>
    </div>
</div>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">Duokit meno</h1>
        <p class="lead blog-description">Čia rasite patį šviežiausią <strong>vietinį</strong> meną.</p>
    </div>
</div>
