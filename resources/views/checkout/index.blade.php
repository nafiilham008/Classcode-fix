@extends('layouts.home.master')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="d-flex justify-align-center" style="padding-top: 100px;">
        <div class="mx-auto mt-5">
            <h2 class="poppins-bold">
                Checkout
            </h2>
        </div>
    </div>
    <!-- detail kelas -->
    <div class="row mt-4" style="text-align: left; padding-left: 100px; padding-right: 100px;">
        <div class="col-md-6">
            <div class="card" style="border-radius: 20px; height:200px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <img class="object-fit-fill" src="{{ asset('images_kelas/' . $check->image) }}" alt="img-thumbnail"
                            width="100px" height="100px" >
                        <p class="poppins-light" style="text-align: right; font-size: 10 px; margin-right: 100px">
                            {{ $check->title }}
                        </p>
                        <p class="poppins-bold" style="text-align: right;">Rp.
                            {{ number_format($check->harga_sebelum) }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-item-center">
                        @if (empty($check->diskon))
                            <form class="form-inline" action="{{ route('check_promo', $check->slug_url) }}"
                                enctype="multipart/form-data" method="POST" style="margin-top: -20px">
                                @csrf
                                <div class="d-flex justify-content-between ml-4 mt-2">
                                    <div class="mr-2 poppins-light">
                                        <label for="inputPassword2" class="sr-only">Kode</label>
                                        <input type="text" class="form-control ml2" name="kode" id="inputPassword2"
                                            placeholder="Kode Promo">

                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2 poppins-light btn-md">check</button>
                                </div>
                            </form>
                        @endif
                    </div>

                </div>
                <div class="card-footer-class">
                    <a class="btn btn-primary btn-block poppins-light" style="border-radius: 0 0 20px 20px;"
                        href="{{ route('cancel_checkout', $check->slug_url) }}">Cancel
                        Checkout</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="border-radius: 20px">
                <div class="card-body">
                    <div class="d-flex justify-content-between" style="text-align: left;">
                        <p class="poppins-bold" style="font-size: 15px;">Ringkasan harga </p>
                        <p class="poppins-bold" style="text-align: right;">Rp. {{ number_format($check->harga_akhir) }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="poppins-bold " style="font-size: 15px;">Diskon </p>
                        <p class="poppins-bold" style="text-align:right;">
                            @if (empty($check->diskon))
                                -
                            @else
                                {{ $check->diskon }}%
                            @endif
                        </p>
                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0;color: black;background-color: black;">
                    <div class="d-flex justify-content-between">
                        <p class="poppins-bold">Harga total</p>
                        <p class="poppins-bold" style="text-align: right;">Rp. {{ number_format($check->harga_akhir) }}
                        </p>
                    </div>

                    <a class="btn btn-success btn-block poppins-light " style="text-align: center; border-radius: 20px"
                        href="{{ route('bayar', $check->slug_url) }}">Payment</a>
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="" style="text-align: left; padding-left: 100px;"
        style="text-align: left; padding-top: 50px; padding-left: 200px; padding-right: 400px;"> --}}

@endsection
