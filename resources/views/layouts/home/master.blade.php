<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel='icon' href='{{ asset(' assets/node_modules/bootstrap/dist/css/img/classcode.png') }}' type='image/x-icon'
        sizes="3x3" />
    <!-- Style Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    @yield('css-tambahan')
</head>

<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
            <!-- LOGO -->
            <a class="navbar-brand ml-5 mb-2" href="{{ route('index') }}">
                <img src="{{ asset('assets/node_modules/bootstrap/dist/css/img/classcode.png') }}" width="80%"
                    height="100%" alt="ClassCode">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseNavbar">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <!-- MENU Navbar-->
            <div class="collapse navbar-collapse" id="collapseNavbar">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mr-sm-4 poppins-light" href="{{ route('index') }}">Home<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-sm-4 poppins-light" href="{{ route('kelas.index') }}">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link poppins-light" href="{{ route('promo.index') }}">Promo</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mt-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('home.search') }}" class="nav-link fas fa-search text-white ml-4"></a>
                    </li>
                </ul>
                @guest
                <ul class="navbar-nav mt-lg-0 mt-autp">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link ml-4 poppins-light" href="{{ route('login') }}">Sign In</a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-lg-0 mt-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-success mr-5 poppins-light rounded-bro register"
                            style="text-align: center;" href="{{ route('register') }}"> Register </a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav mt-lg-0">
                    <li class="nav-item">
                        {{-- <a href="#" class="nav-link fas fa-user-circle fa-2x text-white ml-4"></a> --}}
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar-list-4">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle fas fa-user-circle fa-2x text-white ml-4"
                                        href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @role('admin|mentor')
                                        <a class="dropdown-item poppins-light"
                                            href="{{ route('admin.index') }}">Dashboard</a>
                                        @endrole
                                        @role('user')
                                        <a class="dropdown-item poppins-light"
                                            href="{{ route('dashboard.index') }}">Dashboard</a>
                                        @endrole
                                        <a class="dropdown-item poppins-light" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                @endguest

            </div>
        </nav>
    </section>

    @yield('content')

    <!-- Footer -->
    <section class="footer">
        <footer class="bg-footer text-white">
            <!-- Grid container -->
            <div class="container padding-footer">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6">
                        <a class="navbar-brand" href="{{ route('index') }}">
                            <img src="{{ asset('assets/node_modules/bootstrap/dist/css/img/classcode.png') }}"
                                width="100%" height="100%" alt="ClassCode">
                        </a>

                        <p class="mt-2 poppins-light">
                            Classcode adalah sebuah website untuk mempersiapkan
                            para developer mudah agar siap untuk terjun di era 5.0
                            dengan bimbingan mentor yang berpelangaman.
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col">
                        <h5 class="text-uppercase poppins-bold">Company</h5>

                        <ul class="list-unstyled mb-0">
                            <li class="mt-4 mb-4">
                                <a href="{{ route('about') }}" class="footer-text poppins-light">About</a>
                            </li>
                            <li class="mb-4">
                                <a href="#!" class="footer-text poppins-light">Contact</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-text poppins-light">Instagram</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col">
                        <h5 class="text-uppercase poppins-bold">Useful Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li class="mt-4 mb-4">
                                <a href="#!" class="footer-text poppins-light">Privacy & Policy</a>
                            </li>
                            <li class="mb-4">
                                <a href="#!" class="footer-text poppins-light">Terms & Conditions</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-text poppins-light">Documentation</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col footer-responsive">
                        <h5 class="text-uppercase poppins-bold">Community</h5>

                        <ul class="list-unstyled mb-0">
                            <li class="mt-4 mb-4">
                                <div href="#!" class="footer-text poppins-light">Testimonials</div>
                            </li>
                            <li class="mb-4">
                                <div href="#!" class="footer-text poppins-light">Mentors</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3 poppins-light" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <a class="text-white" href="https://gitlab.com/nafiilham.h/rdk-mm3-pw2021">RDK Teams</a>
            </div>
            <!-- Copyright -->
        </footer>
    </section>

    <!-- ini js dan script -->
    <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    @yield('js-tambahan')
</body>

</html>