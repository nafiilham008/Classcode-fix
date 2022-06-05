@extends('layouts.home.master')

@section('content')
    <section class="catalog">
        <div class="title-kelas text-center mt-5" style="padding-top: 100px;">

            <h2 class="poppins-bold">
                Catalog Class
            </h2>

        </div>
        <div class="row mylist">
            @foreach ($data as $kelas)
                <div class="col-md-4 mt-2 mb-5">
                    <a class="card mx-auto kartuku titleku" style="border-radius: 20px; width:300px"
                        href="{{ route('kelas.detail', $kelas->slug_url) }}">
                        <img class="card-img-top  mx-auto mt-4 object-fit-fill" src="{{ asset('images_kelas/' . $kelas->image) }}"
                            alt="Course" style="width: 250px; height: 250px">
                        <div class="card-body" style="text-align: left;">
                            <p class="card-title poppins-bold">{{ $kelas->title }}</p>
                            <p class="card-text poppins-bold h5">Rp. {{ number_format($kelas->harga) }}</p>
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
                </div>
            @endforeach
        </div>
    </section>
@endsection
