@extends('layouts.home.master')

@section('title')
    Daftar Promo
@endsection

@section('content')
    <section class="catalog">
            <h2 class="font-vietnam font-bold text-center py-20 text-[34px]">
                Promo
            </h2>
            <div class="flex justify-center mb-14">
                <div class="flex flex-wrap lg:gap-5">
                    @foreach ($data as $promo)
                    <div
                        class="lg:w-[300px] bg-white rounded-xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="bg-[#b9ebfc] rounded-t-lg">
                            <a href="#">
                                <img class="" src="{{asset('images_kupon/'. $promo->image)}}" alt="">
                            </a>
                        </div>
                        <div class="py-5 px-4">
                            <a href="#">
                                <h5
                                    class="mb-2 text-xl font-bold font-vietnam tracking-tight text-blue-900 dark:text-white">{{ $promo->title }}</h5>
                                    
                            <div class="flex gap-3 items-center py-3">
                                <iconify-icon icon="ic:outline-discount" style="color: #24a4e0;" width="30" height="30"></iconify-icon>
                                <h3 class="text-4xl font-vietnam text-[#219ebc]">{{ $promo->diskon }}%<</h3>
                            </div>
                        </div>
                    </div><button
                    class="px-4 py-3 text-center rounded-b-xl text-white font-vietnam w-full bg-[#75B843]/80 hover:bg-[#F9AE55] detail" data-url="{{ route('ambil_kupon', $promo->id) }}" type="button" href="">Ambil</button>  
                    @endforeach
                </div>
    
            </div>
        
        {{-- <div class="row mylist">
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
        </div> --}}
    </section>
@endsection

@section('js-tambahan')
    <script>
        $(document).ready(function() {

            // detail kupon 
            $(".detail").click(function() {
                var url = $(this).attr("data-url");
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#exampleModal').modal('show');
                        $('.modal-title').html('Detail Promo');
                        $('.modal-body').html(data['data']);
                    },
                    error: function() {
                        console.log(data);
                    }
                });
                // console.log(url);
            });

            // ambil kupon
            $(".kupon").click(function() {
                var url = $(this).attr("data-url");
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#ambil_kupon').modal('show');
                        $('.modal-title').html('Ambil Kupon');
                        $('.isi_kupon').html(data['data']);

                        $(".copy").click(function() {
                            var text = data['data'];
                            navigator.clipboard.writeText(text);
                            /* Alert the copied text */
                            alert("Copied the text: " + text);
                        });
                    },
                    error: function() {
                        console.log(data);
                    }
                });
                // console.log(url);
            });
        });
    </script>
@endsection
