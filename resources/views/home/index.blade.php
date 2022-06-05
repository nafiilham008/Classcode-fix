@extends('layouts.home.master')

@section('title')
    Welcome To ClassCode Academy
@endsection

@section('content')
    <!-- HOME -->
    <section id="home">
        <div class="d-flex position-relative tm-border-top tm-border-bottom intro-container mt-5">
            <div class="container-fluid">
                <div class="d-flex justify-align-center" style="padding-top: 80px;">
                    <div class="mt-5 homeku">
                        <h1 class="poppins-bold">Start Learning From Best Platform</h1>
                        <p class="poppins-light mt-3">Belajar dengan mentor yang berpengalaman dan
                            metode pembelajaran yang mudah dipahami serta
                            membangun karir di masa depan.</p>
                        <p class="lead mt-5">
                            <a class="btn btn-primary btn-lg poppins-light" href="{{ route('kelas.index') }}"
                                role="button">Catalog
                                Class</a>
                        </p>
                    </div>
                    <div class="mx-auto img-header" style="padding-right: 150px;">
                        <img class="layer1 img-fluid"
                            src="{{ asset('assets/node_modules/bootstrap/dist/css/img/code.png') }}" alt="img-thumbnail">
                        <img class="layer2 img-fluid"
                            src="{{ asset('assets/node_modules/bootstrap/dist/css/img/header1.png') }}"
                            alt="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Opportunity -->
    <section class="fitur">
        <div class="title-kelas text-center mt-5" style="padding-top: 100px;">

            <h2 class="poppins-bold">
                Our Opportunity
            </h2>

        </div>
        <div class="mylist ">
            <div class="card mx-auto kartuku titleku opportunity-responsive">
                <img class="card-img-top  mx-auto mt-5"
                    src="{{ asset('assets/node_modules/bootstrap/dist/css/img/course1.png') }}" alt="Course"
                    style="width: 80px;">
                <div class="card-body">
                    <h5 class="card-title poppins-bold">Online Course</h5>
                    <p class="card-text mb-3">Lorem ipsum is simply dummy
                        text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s lore</p>
                </div>
            </div>
            <div class="card mx-auto kartuku titleku opportunity-responsive">
                <img class="card-img-top  mx-auto mt-5"
                    src="{{ asset('assets/node_modules/bootstrap/dist/css/img/course2.png') }}" alt="Course"
                    style="width: 80px;">
                <div class="card-body">
                    <h5 class="card-title poppins-bold">Expert Tutorial</h5>
                    <p class="card-text">Lorem ipsum is simply dummy
                        text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
            <div class="card mx-auto kartuku titleku opportunity-responsive">
                <img class="card-img-top mx-auto mt-5"
                    src="{{ asset('assets/node_modules/bootstrap/dist/css/img/course3.png') }}" alt="Course"
                    style="width: 80px;">
                <div class="card-body">
                    <h5 class="card-title poppins-bold">Effective Methods</h5>
                    <p class="card-text">Lorem ipsum is simply dummy
                        text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Video -->
    <section class="video-class">
        <div class="d-flex justify-align-center" style="padding-top: 100px;">
            <div class="mx-auto mt-5">
                <h2 class="poppins-bold" style="text-align: center;">
                    High quality video, audio, <br>& live classes
                </h2>
            </div>
        </div>
        <div class="d-flex justify-align-center mx-auto video-responsive" style="text-align: center; padding-top: 50px;">
            <video controls class="card mx-auto" style="border-radius: 20px; width: 800px;" loop>
                <source src="{{ asset('assets/node_modules/bootstrap/dist/css/video/video.mp4') }}" type="video/mp4" />
                Browsermu tidak mendukung.
            </video>
        </div>
        <div class="d-flex justify-align-center" style="padding-top: 50px;">
            <div class="mx-auto">
                <a class="btn btn-success btn-lg poppins-light mr-5 btn-responsive" role="button">Audio Classes</a>
                <a class="btn btn-primary btn-lg poppins-light mr-5 ml-5 btn-responsive" role="button">Live Classes</a>
                <a class="btn btn-success btn-lg poppins-light ml-5 btn-responsive" role="button">Record Classes</a>
            </div>
        </div>
    </section>
    <!-- Catalog Class -->
    <section class="catalog">
        <div class="title-kelas text-center mt-5" style="padding-top: 100px;">

            <h2 class="poppins-bold">
                Catalog Class
            </h2>

        </div>
        <div class="mylist">
            @foreach ($data as $kelas)
                <a class="card mx-auto kartuku titleku" style="border-radius: 20px; width:300px"
                    href="{{ route('kelas.detail', $kelas->slug_url) }}">
                    <img class="card-img-top mx-auto mt-4 object-fit-fill" src="{{ asset('images_kelas/' . $kelas->image) }}" alt="Course"
                        style="width: 200px; height: 200px">
                    <div class="card-body" style="text-align: left;">
                        <p class="card-title poppins-bold">{{ $kelas->title }}</p>
                        <p class="card-text">Rp. {{ number_format($kelas->harga) }}</p>
                        <!-- Bintang -->
                        {{-- <i class="fas fa-star icon-star mr-2"></i>
                        <i class="fas fa-star icon-star mr-2"></i>
                        <i class="fas fa-star icon-star mr-2"></i>
                        <i class="fas fa-star icon-star mr-2"></i>
                        <i class="fas fa-star icon-star mr-2"></i>
                        <i class="poppins-light">
                            (136)
                        </i> --}}
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
        <div class="mx-auto" style="text-align: center; padding-top: 50px;">
            <a class="btn btn-primary btn-lg poppins-light mr-5 ml-5" href="{{ route('kelas.index') }}" role="button">All
                Course</a>
        </div>
    </section>
@endsection
