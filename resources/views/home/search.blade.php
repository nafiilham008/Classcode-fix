@extends('layouts.home.master')

@section('title')
    Search
@endsection

@section('content')

    
    <section class="catalog">
        @if ($data != 'data')
        <h2 class="font-vietnam font-bold text-center py-20 text-[34px]">
            Catalog Class
        </h2>
        <div class="flex justify-center mb-14">
            <div class="flex flex-wrap lg:gap-5">
                @foreach ($data as $kelas)
                    <div
                        class="lg:w-[300px] bg-white rounded-xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="bg-[#b9ebfc] rounded-t-lg">
                            <a href="{{ route('kelas.detail', $kelas->slug_url) }}">
                            <div class="bg-no-repeat bg-center bg-cover  w-[300px] h-48 rounded-t-lg"
                                style="background-image: url('{{ asset('images_kelas/' . $kelas->image) }}');">
                            </div>
                        </a>
                            
                        </div>
                        <div class="py-5 px-4">
                            <a href="{{ route('kelas.detail', $kelas->slug_url) }}">
                                <h5
                                    class="mb-2 text-xl font-bold font-vietnam tracking-tight text-blue-900 dark:text-white">
                                    {{ $kelas->title }}</h5>
                                <h5 class="mb-2 text-base font-vietnam tracking-tight text-blue-900 dark:text-white">IDR
                                    {{ number_format($kelas->harga) }}</h5>
                            </a>
                            <div class="flex gap-3 items-center py-3">
                                <iconify-icon icon="fluent:people-edit-20-regular" style="color: #219ebc;" width="24"
                                    height="24"></iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">{{ $kelas->id_user }}</h3>
                            </div>
                            <div class="flex gap-3 items-center">
                                <iconify-icon icon="ph:medal-light" style="color: #219ebc;" width="24" height="24">
                                </iconify-icon>
                                <h3 class="text-sm font-vietnam text-[#219ebc]">Sertifikat</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
    </section>
@endsection

@section('css-tambahan')
    <style>
        .has-search .form-control {
            padding-left: 2.375rem;
            width: 500px;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

    </style>
@endsection
