
@extends('layouts.auth.master')

@section('title')
    Register
@endsection

@section('content')
<section class="sign-up">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card kartu-signup" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 d-none d-md-block">
                <img src="{{asset('assets/node_modules/bootstrap/dist/css/img/signup-bg.png')}}" alt="login form"
                  class="img-fluid kartu-signup" style="border-radius: 1rem 0 0 1rem;"
                />
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0 poppins-bold">Sign Up</span>
                    </div> 
                    <h5 class="mb-5 poppins-light" style="font-size: 17px;">Let see your best future and growth together with us!</h5> 
                   
                    <!--fullname-->

                    <div class="form-outline mb-4 poppins-light">
                        <label class="form-label" for="form2Example17">Fullname</label>
                        <input type="text" placeholder="Enter your fullname" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!--email-->
                    <div class="form-outline mb-4 poppins-light">
                      <label class="form-label" for="form2Example17">Email address</label>
                      <input type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email">
                      @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--password-->
                    <div class="form-outline mb-4 poppins-light">
                      <label class="form-label" for="form2Example27">Password</label>
                      <input type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password">
                      @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--repeat password-->
                    <div class="form-outline mb-4 poppins-light">
                        <label class="form-label" for="form2Example27"> Repeat Password</label>
                        <input type="password" placeholder="Enter your password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    <!--button-->
                    <div class="pt-1 mb-4">
                      <button class="btn btn-success btn-lg btn-block poppins-light" type="submit">Sign Up</button>
                    </div>
                    <p class="small" style="color: #393f81;">Already have account ? 
                      <a class="italic" href="{{route('login')}}"> Sign In now</a>
                    </p>
                    
                  </form>
                  <!-- Copyright -->
                  <div class="text-center mt-5 small poppins-light" style="background-color: rgba(255, 255, 255, 0.2);">
                    © 2021 Copyright:
                    <a class="text-black" href="https://gitlab.com/nafiilham.h/rdk-mm3-pw2021">RDK Teams</a>
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
