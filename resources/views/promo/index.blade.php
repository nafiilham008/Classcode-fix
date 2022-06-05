@extends('layouts.home.master')

@section('title')
    Daftar Promo
@endsection

@section('content')

    <section class="catalog">
        <div class="title-kelas text-center mt-5" style="padding-top: 100px;">

            <h2 class="poppins-bold">
                Coupon
            </h2>

        </div>
        <div class="row">
            @foreach ($data as $promo)
                <div class="d-flex mx-auto card coupon-responsive mt-5" style="border-radius: 20px;">
                    <img class="card-img-top  mx-auto mt-4 object-fit-fill"
                        src="{{asset('images_kupon/'. $promo->image)}}" alt="Course"
                        style="width: 200px; height: 200px;">
                    <div class="card-body" style="text-align: left;">
                        <p class="card-title poppins-bold h4">{{ $promo->title }}</p>
                        <p class="card-title poppins-light">Discount</p>
                        <p class="card-title poppins-bold">{{ $promo->diskon }}%</p>
                        <hr style="width:100%;text-align:left;margin-left:0;color: black;background-color: black;">
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <button class="btn btn-success btn-sm poppins-light mr-3 btn-lg kupon" style="border-radius: 20px;"
                            data-url="{{ route('ambil_kupon', $promo->id) }}" role="button">Ambil
                            Kupon</button>
                        <button class="btn btn-primary btn-sm poppins-light ml-3 btn-lg detail" style="border-radius: 20px";
                            data-url="{{ route('ambil_promo', $promo->id) }}" role="button">Detail
                            Kupon</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- pup up detail promo --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    {{-- pup up ambil promo --}}
    <div class="modal fade" id="ambil_kupon" tabindex="-1" aria-labelledby="ambil_kuponLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ambil_kuponLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="isi_kupon text-center poppins-bold"></h3>
                    <button class="btn btn-primary poppins-light btn-block copy">Copy Text</button>
                </div>
            </div>
        </div>
    </div>
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
