@extends('layouts.backend.master')

@section('title')
    Tambah Kelas
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
            <div class="card-body">
                <form action="{{ route('admin.kelas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group popppins-bold">
                        <label for="exampleInputEmail1">Nama Kelas</label>
                        <input name="title" type="text" class="form-control popppins-light">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">URL Video</label>
                        <input name="url_video" type="text" class="form-control popppins-light">
                    </div>
                    <div class=" form-group popppins-bold">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea id="summernote" name="description" class="poppins-light"></textarea>
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">Harga</label>
                        <input name="harga" type="number" class="form-control popppins-light">
                    </div>
                    <div class="custom-file mt-2">
                        <input name="image" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile popppins-bold">Image</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 btn-block btn-lg poppins-bold">Submit</button>
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
