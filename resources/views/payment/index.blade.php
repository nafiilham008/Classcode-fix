@extends('layouts.home.master')

@section('title')
    Pembayaran
@endsection

@section('content')
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    <div class="d-flex justify-align-center" style="padding-top: 100px;">
        <div class="mx-auto mt-5">
            <h2 class="poppins-bold">
                Payment
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card p-3">
                    <div class="card-body" style="text-align: left;">
                        <p class="card-title poppins-bold">Ringkasan Pesanan</p>
                        <p class="card-title poppins">{{ $data_fix->title }}</p>

                    </div>
                </div>
            </div>
            


            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-body" style="text-align: left;">
                        <p class="card-title poppins-bold">Cara Pembayaran</p>
                    </div>
                    <form action="{{ route('bayar.konfirmasi', $data->slug_url) }}" method="POST" enctype="multipart/form-data">
                        <div class="col-5">
                            @csrf
                            <div class="form-outline mb-4">
                                <!-- Example single danger button -->
                                <select class="form-control" name="payment">
                                    @foreach ($pay as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->nomer }} |
                                            {{ $item->atas_nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card p-3">
                                <div class="card-body" style="text-align: left;">
                                    @if (empty($data_fix->diskon))
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="textmuted card-title poppins">Harga Normal</p>
                                            <p class="fs-14 fw-bold card-title poppins"> Rp.
                                                {{ number_format($data_fix->harga_sebelum) }} </p>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="textmuted card-title poppins">Harga Akhir</p>
                                            <p class="fs-14 fw-bold card-title poppins">Rp
                                                {{ number_format($data_fix->harga_akhir) }}</p>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="textmuted card-title poppins">Harga Normal</p>
                                            <p class="fs-14 fw-bold card-title poppins"><s>Rp.
                                                    {{ number_format($data_fix->harga_sebelum) }} </s></p>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="textmuted card-title poppins">Harga Akhir</p>
                                            <p class="fs-14 fw-bold card-title poppins">Rp
                                                {{ number_format($data_fix->harga_akhir) }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="card p-3">
                                <div class="card-body" style="text-align: left;">
                                    <div class="d-flex justify-content-between mb-2">
                                        <p class="textmuted card-title poppins-bold">Total Pembayaran</p>
                                        <p class="fs-14 fw-bold card-title poppins">Rp
                                            {{ number_format($data_fix->harga_akhir) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-3">
                                <div class="card-body" style="text-align: left;">
                                    <p class="card-title poppins-bold">Upload bukti pembayaran</p>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label poppins" for="customFile">Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <button type="submit" class="mx-auto btn btn-success btn-block btn-lg mr-12 poppins-light"
                                style="text-align: center;">
                                Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js-tambahan')
    <script>
        // handle custom file inputs
        $('body').on('change', 'input[type="file"][data-toggle="custom-file"]', function(ev) {

            const $input = $(this);
            const target = $input.data('target');
            const $target = $(target);

            if (!$target.length)
                return console.error('Invalid target for custom file', $input);

            if (!$target.attr('data-content'))
                return console.error('Invalid `data-content` for custom file target', $input);

            // set original content so we can revert if user deselects file
            if (!$target.attr('data-original-content'))
                $target.attr('data-original-content', $target.attr('data-content'));

            const input = $input.get(0);

            let name = _.isObject(input) &&
                _.isObject(input.files) &&
                _.isObject(input.files[0]) &&
                _.isString(input.files[0].name) ? input.files[0].name : $input.val();

            if (_.isNull(name) || name === '')
                name = $target.attr('data-original-content');

            $target.attr('data-content', name);

        });
    </script>
@endsection

@section('css-tambahan')
    <style>
        .custom-file-name:after {
            content: attr(data-content) !important;
            position: absolute;
            top: 0px;
            left: 0px;
            display: block;
            height: 100%;
            overflow: hidden;
            padding: 0.5rem 1rem;
        }
    </style>
@endsection
