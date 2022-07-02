<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link href="{{ asset('img/icon.jpg') }}" rel="icon" />

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>

        <nav class="navbar navbar-expand-md navbar-dark bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index')}}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{ asset('img/logo_footer.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Contacto</a>
                        </li>
                    </ul>
                      <ul class="navbar-nav me-auto">
                        <a href="" class=" nav-link mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Shop
                          </a>
                      </ul>



                       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header bg-danger">
                               <img src="{{ asset('img/logo_footer.png') }}" alt="" class="mx-auto">

                             </div>
                             <div class="modal-body text-center">
                                <p>Debes estar logeado para acceder a la Tienda online</p>
                               <a class="nav-link text-success fw-bold" href="{{ route('login') }}">login</a>
                               <a class="nav-link text-success fw-bold" href="{{ route('register') }}">register</a>
                             </div>
                             <div class="modal-footer bg-danger">
                               <button type="button" class="btn btn-success rounded btn-sm" data-bs-dismiss="modal">Close</button>

                             </div>
                           </div>
                         </div>
                       </div>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
<footer class="bg-danger d-flex justify-content-center align-items-center p-3">

   <img src="{{ asset('img/logo_footer.png') }}" alt="">

</footer>
</body>
</html>
