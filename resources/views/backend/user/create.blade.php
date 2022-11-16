@extends('layouts.backend.master')

@section('title')
    Tambah User
@endsection

@section('content')
    <div class="main-content" style="min-height: 534px;">
        @if ($pesan = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <strong>Selamat !</strong> {{ $pesan }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if (Session::has('errors'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br />
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="section">
            <div class="section-header">
                <h1>Daftar Pengguna</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Pengguna</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group popppins-bold">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="name" type="text" class="form-control popppins-light"
                                placeholder="Nama User">
                        </div>
                        <div class="form-group popppins-bold">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control popppins-light"
                                placeholder="Email User">
                        </div>
                        <div class="form-group popppins-bold">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control popppins-light"
                                placeholder="Password User">
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
