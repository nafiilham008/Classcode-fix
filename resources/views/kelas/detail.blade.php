@extends('layouts.home.master')

@section('title')
    {{ $data->title }}
@endsection

@section('content')
    <div class="flex justify-center py-10">
        <h1 class="text-4xl text-center font-vietnam font-bold tracking-wide text-[#395083]">
            {{ $data->title }}
        </h1>
    </div>
    <div class="grid grid-cols-12  h-auto  items-center w-full px-10 py-10">
        <div class="col-span-9 ">
            <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $data->url_video }}"
                style="border-radius: 20px;" class=" "></div>
        </div>
        <div class="col-span-3">
            <div class="flex flex-col items-end">
                <div
                    class="lg:w-[300px] bg-white rounded-t-xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="rounded-t-lg">
                        <a href="#">
                            {{-- <img class="" src="{{ asset('images_kelas/' . $data->image) }}" alt=""> --}}
                            <div class="bg-no-repeat bg-center bg-cover  w-[300px] h-48 rounded-t-lg"
                                style="background-image: url('{{ asset('images_kelas/' . $data->image) }}');">
                            </div>
                        </a>
                    </div>
                    <div class="py-5 px-4">
                        <a href="#">
                            <h5 class="mb-2 text-xl font-bold font-vietnam tracking-tight text-blue-900 dark:text-white">
                                {{ $data->title }}</h5>
                            <h5 class="mb-2 text-base font-vietnam tracking-tight text-blue-900 dark:text-white">IDR
                                {{ number_format($data->harga) }}</h5>
                        </a>
                        <div class="flex gap-3 items-center py-3">
                            <iconify-icon icon="cil:clock" style="color: #219ebc;" width="24" height="24">
                            </iconify-icon>
                            <h3 class="text-sm font-vietnam text-[#219ebc]">Mentor</h3>
                        </div>
                        <div class="flex gap-3 items-center">
                            <iconify-icon icon="ph:medal-light" style="color: #219ebc;" width="24" height="24">
                            </iconify-icon>
                            <h3 class="text-sm font-vietnam text-[#219ebc]">Sertifikat</h3>
                        </div>
                    </div>
                </div>
                <a
                    class="px-4 py-3 text-center rounded-b-xl text-white font-vietnam w-[300px] bg-[#75B843]/80 hover:bg-[#F9AE55]" type="button" @role('user') href="{{ route('checkout.index', $data->slug_url) }} @endrole">Gabung
                    Kelas</a>
            </div>
        </div>
    </div>
    <div class="px-10">
        <h1 class="text-[24px] mb-1 text-blue-900 font-bold text-justify font-vietnam  py-3">Description</h1>
        <h1 class="text-[16px] w-3/4 mb-1 text-blue-900 text-justify font-vietnam  py-3">{!! $data->description !!}</h1>
    </div>
    <div class="py-10 px-10">
        <h1 class="text-[24px] mb-1 text-blue-900 font-bold text-justify font-vietnam  py-3">Mentor</h1>
        <div class="bg-white hover:shadow-lg w-[300px] rounded-xl h-48 lg:px-10 px-5 hover:top-[2px] hover:left-[1px]">
            <div class="flex justify-center flex-col items-center h-full">
                <img class="w-[80px] h-[80px] rounded-full" src="../../assets/image/nafi.png" alt="Rounded avatar">
                <div class="flex justify-center">
                    <h1 class="text-[16px] w-3/4  text-blue-900 text-center font-bold font-vietnam  py-3">
                        {{ $data->id_user }}</h1>
                </div>
            </div>
        </div>
    </div>
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
