@extends('layouts.dashboard.master')

@section('title')
    Dashboard Pelanggan
@endsection

@section('content')
    <div class="main-content" style="min-height: 534px;">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
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
    
                                        <img class="card-img-top" src="{{ asset('images_kelas/' . $item->image) }} " style="max-width: 100px"
                                            alt="Course" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>



            {{-- UNTUK DASHBOARD ADMIN DAN MENTOR --}}
            {{-- <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>
                            <div class="card-body">
                                10
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
                                <h4>News</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>
@endsection


