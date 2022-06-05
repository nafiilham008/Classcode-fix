@extends('layouts.backend.master')

@section('title')
    Halaman Promo Setting
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">@yield('title')</h1>

        @if ($pesan = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat !</strong> {{ $pesan }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('errors'))
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary popppins-bold">Nama Promo : {{ $data->title }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.promo.update', $data->id) }}" method="POST">
                    @csrf
                    @method("PATCH")

                    <div class="form-group popppins-bold">
                        <label for="exampleInputEmail1">Nama Promo</label>
                        <input name="title" type="text" class="form-control popppins-light" value="{{ $data->title }}">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">Kode Promo</label>
                        <input name="kode_promo" type="text" class="form-control popppins-light" value="{{ $data->kode_promo }}">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">Diskon</label>
                        <input name="diskon" type="number" class="form-control popppins-light" value="{{ $data->diskon }}">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea id="summernote" name="deskripsi" class="popppins-light"> {!! $data->deskripsi !!} </textarea>
                    </div>
                    <div class="custom-file popppins-bold">
                        <input name="image" type="file" class="custom-file-input" >
                        <label class="custom-file-label" for="customFile" value="{{ $data->image }}">Image</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 btn-block btn-lg">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('css-tambahan')
    {{-- SUMMERNOTE --}}
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js-tambahan')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
