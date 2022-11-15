@extends('layouts.home.master')

@section('title')
    {{ $data->title }}
@endsection

@section('content')
    <section class="video-class">
        <div class="row">
            <div class="col md-8 class-detail-1">
                <div class="card" style="border-radius: 20px;" class="">
                    <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $data->url_video }}"
                        style="border-radius: 20px;" class=""></div>
                </div>
            </div>
            <div class="col-md-4 class-detail">
                <div class="card kartu-size-class ">
                    <img class="card-img-top  mx-auto mt-4 object-fit-fill result-search-image-responsive" src="{{ asset('images_kelas/' . $data->image) }}" alt="Course"
                        style="width: 200px; height: 200px">
                    <div class="card-body" style="text-align: left;">
                        <p class="card-title poppins-bold"></p>
                        <p class="card-text class-judul ">
                        <h3 class="poppins-bold">Rp.
                            {{ number_format($data->harga) }}</h3>
                        </p>
                        <p class="card-title font-italic">Dapat diakses selamanya</p>
                    </div>
                    <div class="card-footer-class">      
                        <a class="btn btn-success btn-lg btn-block poppins-bold" type="button"
                            style="border-radius: 0 0 20px 20px;" @role('user') href="{{ route('checkout.index', $data->slug_url) }} @endrole">
                            Gabung Kelas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="deskripsi">
        <div class="row">
            <div class="col md-8">
                <!-- title -->
                <p><h2 class="poppins-bold">{{ $data->title }}</h2></p>
                <!-- desc -->
                <p><h5 class="poppins-bold">Description </h5></p>
                <!-- details -->
                {!! $data->description !!}
            </div>
        </div>

        <!-- picture -->
        <p><h5 class="poppins-bold mt-5 gambar-hilang">Picture </h5></p>
        <div class="row gambar-hilang" id="pic">
            <div class="col-md-4">
                <a class="lightbox" href="#detail1">
                    <img src="{{ asset('images_kelas/' . $data->image) }}" class="picture-responsive-detail">
                </a>
                <div class="lightbox-target" id="detail1">
                    <img src="{{ asset('images_kelas/' . $data->image) }}" />
                    <a class="lightbox-close" href="#pic"></a>
                </div>
            </div>
        </div>

        <!-- Mentor -->
        <p class="poppins-bold mt-4" style="font-size: 22px;">Mentor</p>
        <div class="row">
            <div class="col">
                <a class="card kartu-size-class-1">
                    <img class="card-img-top mt-3 rounded-sircle mx-auto"
                        src="{{ asset('assets/node_modules/bootstrap/dist/css/img/novia.png') }}" alt="Novia"
                        style="width: 55px;">
                    <div class="card-body text-center">
                        <p class="card-title poppins-bold">{{ $data->id_user }}</p>
                    </div>
                    <div class="card-body" style="text-align: left; ">
                    </div>
                </a>

            </div>
        </div>
    </section>
@endsection

@section('css-tambahan')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.12/plyr.css" />
@endsection

@section('js-tambahan')
    <script src="https://cdn.plyr.io/3.6.12/plyr.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
            const player = new Plyr('#player');

            // Expose
            window.player = player;

            // Bind event listener
            function on(selector, type, callback) {
                document.querySelector(selector).addEventListener(type, callback, false);
            }

            // Play
            on('.js-play', 'click', () => {
                player.play();
            });

            // Pause
            on('.js-pause', 'click', () => {
                player.pause();
            });
            
            // Stop
            on('.js-stop', 'click', () => {
                player.stop();
            });
            
            // Rewind
            on('.js-rewind', 'click', () => {
                player.rewind();
            });
            
            // Forward
            on('.js-forward', 'click', () => {
                player.forward();
            });
        });
    </script>
@endsection
