@extends('layouts.backend.master')

@section('title')
    Halaman Admin
@endsection

@section('content')
    <div class="main-content" style="min-height: 534px;">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            {{-- UNTUK DASHBOARD ADMIN DAN MENTOR --}}
            <div class="row">

                @role('admin')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pelanggan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $dataUser }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Mentor</h4>
                                </div>
                                <div class="card-body">
                                    {{ $dataMentor }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            @role('mentor')
                                <div class="card-header">
                                    <h4>Total Kelas ( {{ Auth()->user()->username }} )</h4>
                                </div>
                                <div class="card-body">
                                    {{ $dataKelasMentor }}
                                </div>
                            @endrole
                            @role('admin')
                                <div class="card-header">
                                    <h4>Total Kelas</h4>
                                </div>
                                <div class="card-body">
                                    {{ $dataKelas }}
                                </div>
                            @endrole
                        </div>
                    </div>
                </div>
                


                {{-- <div class="row">
                @foreach ($data as $item)
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ $item->title }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('dashboard.kelas.index', $item->slug_url) }}" class="btn btn-primary">
                                        Lihat Kelas
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6 col-lg-6">

                                        <p>Mentor</p>
                                        {{ $item->id_user }}
                                    </div>
                                    <div class="col-md-6 col-lg-6">

                                        <img class="card-img-top" src="{{ asset('images_kelas/' . $item->image) }} "
                                            style="max-width: 100px" alt="Course">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div> --}}




            </div>
        </section>
    </div>
@endsection
