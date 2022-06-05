@extends('layouts.dashboard.master')

@section('title')
    Dashboard User
@endsection

@section('content')

    <div class="d-flex justify-align-center">
        <div class="mx-auto mt-3 mb-5">
            <h2 class="poppins-bold">
                My Class
            </h2>
        </div>
    </div>
    <div class="row">
        @foreach ($data as $item)

            <div class="d-flex justify-content-between mb-5 mx-auto">
                <a class="card kartuku titleku" style="border-radius: 20px; width:400px; height: 200px"
                    href="{{ route('dashboard.kelas.index', $item->slug_url) }}">
                    <div class="row">
                        <div class="col-6">
                            <img class="card-img-top ml-4 mt-4" src="{{ asset('images_kelas/' . $item->image) }}"
                                alt="Course" style="width: 180px; height: 150px; border-radius: 20px">

                        </div>
                        <div class="col-6">
                            <div class="card-body" style="text-align: left;">
                                <p class="card-title poppins-bold">{{ $item->title }}</p>
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

                        </div>

                    </div>
                </a>
            </div>
            {{-- <div class="col"></div> --}}

        @endforeach

    </div>

    {{-- @foreach ($data as $kelas)
        @endforeach --}}



@endsection

@section('css-tambahan')
    <style>
        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        a:active {
            text-decoration: none;
        }

    </style>
@endsection
