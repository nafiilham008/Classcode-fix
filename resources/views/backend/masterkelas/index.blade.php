@extends('layouts.backend.master')

@section('title')
    Tambah Materi Kelas
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
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                    <a href="{{ route('admin.masterkelas.buat', $kelas->slug_url) }}"
                        class="btn btn-primary btn-sm">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Nama Mentor</th>
                                <th scope="col">Title</th>
                                <th scope="col">URL Video</th>
                                <th scope="col">Slug URL</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->url_video }}</td>
                                    <td>{{ $item->slug_url }}</td>

                                    <th>
                                        <a href="{{ route('admin.masterkelas.edit', ['url_kelas' => $kelas->slug_url, 'id' => $item->id]) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <a href="{{ route('admin.masterkelas.hapus', ['url_kelas' => $kelas->slug_url, 'id' => $item->id]) }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
