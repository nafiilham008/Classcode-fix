@extends('layouts.home.master')

@section('title')
    Gagal
@endsection

@section('content')
    {{-- <div class="row container-fluid">
        <div class="col-6 mx-auto my-auto">
            <div class="mx-auto p-5 container shadow">
                <h2 class="poppins-bold text-center mb-5">Payment Successful !</h2>
                <p>Transaction number : {{ $check->id }}</p>
                <p>Amount Paid : Rp. {{ number_format($check->harga) }}</p>
                <p>Bank : {{ $pay->name }}</p>
            </div>
        </div>
        <div class="col-5">
            <div class="text-center">
                <img src="{{ asset('assets/image/sukses.png') }}" class="rounded img-fluid" alt="sukses" width="500"
                    height="500" />
            </div>
        </div>
    </div> --}}

    <div class="d-flex mx-auto justify-content-center" style="padding-top: 100px">
        <img src="{{ asset('assets/image/gagal.svg') }}" alt="" width="500px">
    </div>
    <div class="d-flex mx-auto justify-content-center mt-2">
        <h3 class="poppins-bold">Kelas sudah pernah dibeli, silakan cek dashboard user</h3>
    </div>
@endsection
