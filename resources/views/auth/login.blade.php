@extends('layouts.auth.master')

@section('title')
    Login
@endsection

@section('content')
    <section class="login">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl">
                    <div class="card kartu-login" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('assets/node_modules/bootstrap/dist/css/img/signup-bg.png') }}"
                                    alt="login form" class="img-fluid kartu-login" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0 poppins-bold">Let’s Join With Us!</span>
                                        </div>
                                        <h5 class="mb-5 poppins-light" style="font-size: 17px;">Let see your best future and
                                            growth
                                            together with us!</h5>
                                        <!--email-->
                                        <div class="form-outline mb-4 poppins-light">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                            <input type="email" placeholder="Enter your email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--password-->
                                        <div class="form-outline poppins-light mb-2">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" placeholder="Enter your password" name="password"
                                                class="form-control  @error('password') is-invalid @enderror" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- forgot -->
                                        <a class="italic-boy poppins-light" href="{{ route('password.request') }}">Forgot
                                            password?</a>
                                        <p class="small text-muted mb-3 pb-lg-2 poppins-light" style="color: #393f81;">Don't
                                            have an
                                            account?
                                            <a class="italic poppins-light" href="{{ route('register') }}">Register
                                                here!</a>
                                        </p>

                                        <!--button-->
                                        <div class="pt-1 mb-5">
                                            <button type="submit"
                                                class="btn btn-success btn-lg btn-block poppins-bold">Login</button>
                                        </div>
                                    </form>
                                    <!-- Copyright -->
                                    <div class="text-center poppins-light small">
                                        © 2021 Copyright:
                                        <a class="poppins-light" href="https://gitlab.com/nafiilham.h/rdk-mm3-pw2021">RDK
                                            Teams</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css-tambahan')
    <style>
        .italic-boy {
            color: #393f81;
            font-style: normal;
        }

        .italic-boy:hover {
            color: #F9AE55;
            font-style: italic;
        }

    </style>
@endsection
