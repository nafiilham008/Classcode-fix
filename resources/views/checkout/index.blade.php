@extends('layouts.home.master')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="flex justify-center py-10">
        <h1 class="text-4xl text-center font-vietnam font-bold tracking-wide text-[#395083]">
            Checkout
        </h1>
    </div>
    <div>
        <div class="grid grid-cols-12 px-20 py-10">
            <div class="col-span-6">
                <div class="bg-white h-56 py-4 px-3 w-3/4 rounded-xl ">
                    <div class="grid grid-cols-12">
                        <div class="col-span-3">
                            <img class="w-[80px] h-[80px] rounded-lg" src="{{ asset('images_kelas/' . $check->image) }}"
                                alt="Rounded avatar">
                        </div>
                        <div class="col-span-6">
                            <h1 class="text-[16px] line-clamp w-3/4 text-blue-900 font-bold text-justify font-vietnam  ">
                                {{ $check->title }}</h1>

                        </div>
                        <div class="col-span-3">
                            <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">IDR
                                {{ number_format($check->harga_sebelum) }}</h5>
                        </div>
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
                                    <button type="submit"
                                        class="btn btn-primary mb-2 poppins-light btn-md text-warning">check</button>
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="mt-4 flex justify-center">
                        <a href=""
                            class="bg-[#75B843]/80 hover:bg-[#F9AE55] px-4 py-3 text-white font-vietnam rounded-xl">Cancel
                            Checkout
                        </a>
                    </div>

                </div>

            </div>
            <div class="col-span-6  ">
                <div class="bg-white w-3/4 rounded-xl py-10 px-10">
                    <div class="flex justify-between">
                        <h5
                            class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                            Ringkasan Harga</h5>
                        <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                            {{ number_format($check->harga_akhir) }}</h5>
                    </div>
                    <div class="flex justify-between">
                        <h5
                            class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                            Diskon</h5>
                        <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                            @if (empty($check->diskon))
                                -
                            @else
                                {{ $check->diskon }}%
                            @endif
                        </h5>
                    </div>
                    <hr class="w-full h-0.5 mt-3 mb-3 bg-blue-900">
                    <div class="flex justify-between">
                        <h5
                            class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                            Harga Total</h5>
                        <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                            {{ number_format($check->harga_akhir) }}</h5>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('bayar', $check->slug_url) }}"
                            class="bg-[#F9AE55] hover:bg-[#75B843]/80 px-4 py-3 text-white font-vietnam rounded-xl">Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
