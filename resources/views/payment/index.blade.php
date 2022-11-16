@extends('layouts.home.master')

@section('title')
    Pembayaran
@endsection

@section('content')


    @if (Session::has('errors'))
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br />
            @endforeach
        </div>
    @endif

    <div class="flex justify-center py-10">
        <h1 class="text-4xl text-center font-vietnam font-bold tracking-wide text-[#395083]">
            Payment
        </h1>
    </div>
    <div class="px-20">
        <div class="bg-white rounded-xl border border-b-2 px-5 py-5">
            <h1 class="text-[24px] mb-1 text-blue-900 font-bold text-justify font-vietnam  py-3">Ringkasan Pesanan</h1>
            <h1 class="text-[16px] w-3/4 mb-1 text-blue-900 text-justify font-vietnam ">{{ $data_fix->title }}</h1>
        </div>
    </div>
    <div class="px-20">
        <div class="bg-white rounded-xl border-b-2 border px-5 py-5">
            <h1 class="text-[24px] mb-1 text-blue-900 font-bold text-justify font-vietnam  py-3">Cara pembayaran</h1>
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
            </form>
            <div class="bg-white rounded-xl border-b-2 border px-5 py-3">
                @if (empty($data_fix->diskon))
                    <div class="flex justify-between">
                        <h5
                            class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                            Harga Normal</h5>
                        <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                            IDR. {{ number_format($data_fix->harga_sebelum) }}</h5>
                    </div>
                    <div class="flex justify-between mt-3">
                        <h5
                            class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                            Harga Akhir</h5>
                        <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                            IDR. {{ number_format($data_fix->harga_akhir) }}</h5>
                    </div>
                @else
                    <div class="flex justify-between">
                        <h5
                            class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                            Harga Normal</h5>
                        <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                            IDR. <s>{{ number_format($data_fix->harga_sebelum) }}</s></h5>
                    </div>
                    <div class="flex justify-between mt-3">
                        <h5
                            class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                            Harga Akhir</h5>
                        <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                            IDR. {{ number_format($data_fix->harga_akhir) }}</h5>
                    </div>
                @endif
            </div>
            <div class="bg-white rounded-xl border-b-2 border px-5 py-4">
                <div class="flex justify-between">
                    <h5 class="text-base font-vietnam tracking-tight text-center font-bold text-blue-900 dark:text-white">
                        Total Pembayaran</h5>
                    <h5 class="text-base font-vietnam tracking-tight text-center text-blue-900 dark:text-white">
                        IDR. {{ number_format($data_fix->harga_akhir) }}</h5>
                </div>

            </div>
            <div class="bg-white rounded-xl border-b-2 border px-5 py-3">
                <h5 class="text-base font-vietnam tracking-tight text-left font-bold mb-3 text-blue-900 dark:text-white">
                    Total Pembayaran</h5>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label poppins" for="customFile">Image</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="submit"
                    class="bg-[#75B843]/80 hover:bg-[#F9AE55] px-4 py-3 text-white font-vietnam rounded-xl">Bayar</button>
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
