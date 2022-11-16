@extends('layouts.dashboard.master')

@section('title')
    Kelasku
@endsection

@section('content')
    <div class="main-content" style="min-height: 534px;">
        <section class="section">
            <div class="section-header">
                <h1>{{ $data->title }}</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
    
                    <div class="list-group">
                        @foreach ($materi as $master)
                            <a href="{{ route('dashboard.kelas.materi', ['slug_url' => $data->slug_url, 'slug_materi' => $master->slug_url]) }}"
                                class="list-group-item list-group-item-action ">
                                {{ $master->title }}
                            </a>
                        @endforeach
                    </div>
    
                </div>
                <div class="col-12 col-md-8 col-lg-8">
    
                    <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $data->url_video }}"></div>
    
                </div>

            </div>
        </section>
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
