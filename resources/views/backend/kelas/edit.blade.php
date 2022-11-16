@extends('layouts.backend.master')

@section('title')
    Edit Kelas
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
                <h1>Daftar Kelas</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kelas.update', $data->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group popppins-bold">
                            <label for="email">Title</label>
                            <input type="text" class="form-control popppins-light" name="title"
                                value="{{ $data->title }}">
                        </div>
                        <div class="form-group popppins-bold">
                            <label for="fullname">Url Video</label>
                            <input type="text" class="form-control popppins-light" name="url_video"
                                value="{{ $data->url_video }}">
                        </div>
                        <div class="form-group popppins-bold">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea id="summernote" name="description" class="popppins-light">{!! $data->description !!}</textarea>
                        </div>
                        <div class="form-group popppins-bold">
                            <label for="fullname">Harga</label>
                            <input type="number" class="form-control popppins-light" name="harga"
                                value="{{ $data->harga }}">
                        </div>
                        <div class="form-group">
                            <h6><label for="image">Gambar</label></h6>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1 btn-block" type="submit">Submit</button>
                        </div>
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
