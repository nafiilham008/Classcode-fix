@extends('layouts.home.master')

@section('title')
    Search
@endsection

@section('content')
    {{-- <div class="d-flex justify-align-center " style="padding-top: 100px;"> --}}
    <div class="title-kelas text-center mt-5" style="padding-top: 100px;">

        <h2 class="poppins-bold">
            Search
        </h2>

    </div>
    <!-- Actual search box -->
    <form class="has-search search-responsive mt-5" action="{{ route('home.search') }}" method="GET">
        <div class="d-flex justify-content-center">

            {{-- <span class="fa fa-search form-control-feedback"></span> --}}
            <input type="text" style="border-radius: 20px"
                class="form-control poppins-light @error('search') is-invalid @enderror" placeholder="Cari Kelas.."
                name="search">
            @error('search')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button class="btn btn-primary fas fa-search fa-1x btn-md ml-2" type="submit"></button>
        </div>
    </form>
    {{-- </div>
    </div> --}}


    @if ($data == 'data')
        <h5 class="poppins-bold text-center mt-5">
            Recommend
        </h5>
        <div class="mylist">
            @foreach ($all as $kelas)
                <a class="card mx-auto kartuku titleku result-search-responsive" style="border-radius: 20px; width:300px"
                    href="{{ route('kelas.detail', $kelas->slug_url) }}">
                    <img class="card-img-top  mx-auto mt-4 object-fit-fill result-search-image-responsive"
                        src="{{ asset('images_kelas/' . $kelas->image) }}" alt="Course"
                        style="width: 200px; height: 200px">
                    <div class="card-body" style="text-align: left;">
                        <p class="card-title poppins-bold">{{ $kelas->title }}</p>
                        <p class="card-text">Rp. {{ number_format($kelas->harga) }}</p>
                        <hr style="width:100%;text-align:left;margin-left:0;color: black;background-color: black;">
                    </div>
                    <div class="card-body" style="text-align: left; ">
                        <p class="card-text mentor poppins-bold">
                            {{ $kelas->id_user }}
                        </p>
                        <p class="card-text">
                            Mentor
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    @if ($data != 'data')
        <h5 class="poppins-bold text-center mt-5">
            Similar Search
        </h5>
        <div class="row mylist">
            @foreach ($data as $item)
                <div class="d-flex justify-content-between mt-5 mr-5 ml-5">
                    <a class="card mx-auto kartuku titleku result-search-responsive"
                        style="border-radius: 20px; width:300px" href="{{ route('kelas.detail', $item->slug_url) }}">
                        <img class="card-img-top  mx-auto mt-4 object-fit-fill result-search-image-responsive"
                            src="{{ asset('images_kelas/' . $item->image) }}" alt="Course"
                            style="width: 250px; height: 250px">
                        <div class="card-body" style="text-align: left;">
                            <p class="card-title poppins-bold">{{ $item->title }}</p>
                            <p class="card-text poppins-bold h5">Rp. {{ number_format($item->harga) }}</p>
                            <hr style="width:100%;text-align:left;margin-left:0;color: black;background-color: black;">
                        </div>
                        <div class="card-body" style="text-align: left; ">
                            <p class="card-text mentor poppins-bold">
                                {{ $item->id_user }}
                            </p>
                            <p class="card-text">
                                Mentor
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
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
