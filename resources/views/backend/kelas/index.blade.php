@extends('layouts.backend.master')

@section('title')
    Daftar Kelas
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
        <section class="section">
            <div class="section-header">
                <h1>Daftar Kelas</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Kelas</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.kelas.buat') }}" class="btn btn-icon icon-right btn-primary"><i
                                class="far fa-add"></i>
                            Tambah</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Url Video</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Nama Mentor</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Gambar Title</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @role('admin')
                                    @foreach ($data as $kelas)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $kelas->url_video }}</td>
                                            <td>{{ $kelas->title }}</td>
                                            <td><span class="badge badge-success">{{ $kelas->id_user }}</span></td>
                                            <td>{{ $kelas->harga }}</td>

                                            <td><img src="{{ asset('images_kelas/' . $kelas->image) }}" alt=""
                                                    width="50px" height="50px"></td>
                                            <th>
                                                <div class="card-header-action">
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown"
                                                            class="btn btn-warning dropdown-toggle"
                                                            aria-expanded="false">Aksi</a>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                            style="position: absolute; transform: translate3d(-60px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a href="{{ route('admin.kelas.edit', $kelas->id) }}"
                                                                class="dropdown-item has-icon"><i class="far fa-edit"></i>
                                                                Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="{{ route('admin.kelas.hapus', $kelas->id) }}"
                                                                class="dropdown-item has-icon text-danger trigger--fire-modal-7"
                                                                data-confirm="Hapus Data?|Anda yakin akan menghapus data?"
                                                                data-confirm-yes="event.preventDefault();
                                                            document.getElementById('delete').submit();">
                                                                <form id="delete"
                                                                    action="{{ route('admin.kelas.hapus', $kelas->id) }}"
                                                                    method="GET" class="d-none">
                                                                    @csrf
                                                                </form>
                                                                <i class="far fa-trash-alt"></i>
                                                                Delete
                                                            </a>
                                                            <a href="{{ route('admin.masterkelas.index', $kelas->slug_url) }}"
                                                                class="dropdown-item has-icon text-primary"><i class="far fa-plus"></i>
                                                                Tambah Materi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($dataMentor as $kelas)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $kelas->url_video }}</td>
                                            <td>{{ $kelas->title }}</td>
                                            <td><span class="badge badge-success">{{ $kelas->id_user }}</span></td>
                                            <td>{{ $kelas->harga }}</td>

                                            <td><img src="{{ asset('images_kelas/' . $kelas->image) }}" alt=""
                                                    width="50px" height="50px"></td>
                                            <th>
                                                <div class="card-header-action">
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown"
                                                            class="btn btn-warning dropdown-toggle"
                                                            aria-expanded="false">Aksi</a>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                            style="position: absolute; transform: translate3d(-60px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a href="{{ route('admin.kelas.edit', $kelas->id) }}"
                                                                class="dropdown-item has-icon"><i class="far fa-edit"></i>
                                                                Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="{{ route('admin.kelas.hapus', $kelas->id) }}"
                                                                class="dropdown-item has-icon text-danger trigger--fire-modal-7"
                                                                data-confirm="Hapus Data?|Anda yakin akan menghapus data?"
                                                                data-confirm-yes="event.preventDefault();
                                                        document.getElementById('delete').submit();">
                                                                <form id="delete"
                                                                    action="{{ route('admin.kelas.hapus', $kelas->id) }}"
                                                                    method="GET" class="d-none">
                                                                    @csrf
                                                                </form>
                                                                <i class="far fa-trash-alt"></i>
                                                                Delete
                                                            </a>
                                                            <a href="{{ route('admin.masterkelas.index', $kelas->slug_url) }}"
                                                                class="dropdown-item has-icon text-primary"><i class="far fa-plus"></i>
                                                                Tambah Materi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endrole
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
