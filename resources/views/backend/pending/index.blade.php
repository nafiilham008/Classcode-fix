@extends('layouts.backend.master')

@section('title')
    Halaman Pending Kelas
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
                    <h6 class="m-0 font-weight-bold text-primary popppins-bold">Data Pending</h6>
                    {{-- <a href="{{route('admin.promo.buat')}}" class="btn btn-primary btn-sm popppins-bold">Tambah</a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="popppins-bold">
                                <th scope="col">#</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Nama Mentor</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Bukti Transfer</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="popppins-light">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $pending)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $pending->title }}</td>
                                    <td>{{ $pending->harga }}</td>
                                    <td>{{ $pending->id_user }}</td>
                                    <td>{{ $pending->username }}</td>
                                    <td>{{ $pending->status }}</td>
                                    <td><img src="{{ asset('images_trx/' . $pending->image_trx) }}" alt=""
                                            width="50px"></td>
                                    <th>
                                        {{-- <a href="{{ route('admin.promo.edit', $pending->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <a href="{{ route('admin.promo.hapus', $pending->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                        <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" href="{{ url('admin/pending', $pending->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @foreach ($data as $pending)
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5 poppins-light" id="exampleModalLabel">Pending Status</h4>
                    </div>
                    <form action="{{ route('admin.pending.kelas.update', $pending->id) }}" method="POST">
                        {{-- <form action="/admin/pending/update/{{ $data->id }}"> --}}
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <select class="form-control" name="status">
                                <option value="pending">Pending</option>
                                <option value="done">Sukses</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

{{-- @section('css-tambahan')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection --}}

@section('js-tambahan')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
@endsection
