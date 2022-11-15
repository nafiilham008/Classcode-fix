@extends('layouts.dashboard.master')

@section('title')
    Kelas
@endsection

@section('content')
    <div class="row container-fluid mt-5">
        <div class="col-4">
            <p class="poppins-bold">
                <i class="fas fa-arrow-left mr-4"></i>
                <a href="{{ route('dashboard.index') }}">Kembali ke Dashboard </a>
            </p>
            @foreach ($materi as $master)
                <a class="btn btn-materi text-white poppins-light btn-lg btn-block my-4"
                    href="{{ route('dashboard.kelas.materi', ['slug_url' => $data->slug_url, 'slug_materi' => $master->slug_url]) }}">{{ $master->title }}</a>
            @endforeach
        </div>
        <div class="col-8">
            <p class="poppins-bold">Videos</p>
            <div class="card" style="border-radius: 20px; width: 700px;">
                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $data->url_video }}"></div>
            </div>
        </div>
    </div>
@endsection

@section('css-tambahan')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.12/plyr.css" />
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

@section('js-tambahan')
    <script src="https://cdn.plyr.io/3.6.12/plyr.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
            const player = new Plyr("#player");

            // Expose
            window.player = player;

            // Bind event listener
            function on(selector, type, callback) {
                document
                    .querySelector(selector)
                    .addEventListener(type, callback, false);
            }

            // Play
            on(".js-play", "click", () => {
                player.play();
            });

            // Pause
            on(".js-pause", "click", () => {
                player.pause();
            });

            // Stop
            on(".js-stop", "click", () => {
                player.stop();
            });

            // Rewind
            on(".js-rewind", "click", () => {
                player.rewind();
            });

            // Forward
            on(".js-forward", "click", () => {
                player.forward();
            });
        });
    </script>
@endsection
