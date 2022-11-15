@extends('layouts.backend.master')

@section('title')
    Tambah User
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
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group popppins-bold">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="name" type="text" class="form-control popppins-light" placeholder="Nama User">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" type="email" class="form-control popppins-light" placeholder="Email User">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control popppins-light" placeholder="Password User">
                    </div>
                    <div class="form-group">
                        <label>Pilih Role</label>
                        <select class="form-control" name="role">
                            @foreach ($dataRole as $item)
                                <option>{{ $item->name }}</option>
                            @endforeach
                        </select>
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
