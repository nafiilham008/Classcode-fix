@extends('layouts.home.master')

@section('title')
    Sukses
@endsection

@section('content')
    <div class="row container-fluid" style="padding-top: 100px">
        <div class="col-6 mx-auto my-auto">
            <div class="mx-auto p-5 container shadow">
                <h2 class="poppins-bold text-center mb-5">Payment Successful !</h2>
                <p>Transaction number : {{$check->id}}</p>
                <p>Amount Paid : Rp. {{ number_format($check->harga)}}</p>
                <p>Bank : {{ $pay->name}}</p>
            </div>
        </div>
        <div class="col-6">
            <div class="text-center">
                <img src="{{asset('assets/image/sukses.png')}}" class="rounded img-fluid" alt="sukses" width="500px"
                    height="500" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <h2><a class="poppins-bold btn btn-primary btn-lg" href="{{ route('dashboard.index') }}">Mulai Belajar</a></h2>
        </div>
    </div>
@endsection
