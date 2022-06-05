@extends('layouts.app')

@section('content')

    <div class="container h-100" style="padding-top: 70px">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl">
                <div class="card card-forgot" style="border-radius: 1rem;">

                    {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{asset('assets/image/reset_password.png')}}" alt="reset form"
                                class="img-fluid kartu-login" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <span class="h1 fw-bold mb-0 poppins-bold">Reset Password</span>
                                    </div>
                                    <!--email-->
                                    <div class="form-outline mb-4 poppins-light">
                                        <label class="form-label" for="form2Example17">Email</label>
                                        {{-- <input type="email" placeholder="Enter your email" class="form-control" /> --}}
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <!--button-->
                                    <div class="pt-1 mb-5">
                                        <button class="btn btn-success btn-lg btn-block poppins-bold" type="submit"
                                            href="index_auth.html">Send Confirmation Link</button>
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

@endsection

@section('css-tambahan')
    <style>
        .card-forgot{
            height: 450px;
        }
    </style>
@endsection
