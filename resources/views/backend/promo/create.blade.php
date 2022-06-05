@extends('layouts.backend.master')

@section('title')
    Tambah Promo
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

        <!-- DataTales Example -->

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.promo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group popppins-bold">
                        <label for="exampleInputEmail1">Nama Promo</label>
                        <input name="title" type="text" class="form-control popppins-light">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">Kode Promo</label>
                        <input name="kode_promo" type="text" class="form-control popppins-light">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">Diskon</label>
                        <input name="diskon" type="number" class="form-control popppins-light">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea id="summernote" name="deskripsi" class="popppins-light"></textarea>
                    </div>
                    <div class="custom-file popppins-bold">
                        <input name="image" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Image</label>
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
