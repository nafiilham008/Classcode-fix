@extends('layouts.backend.master')

@section('title')
    Halaman Partner
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
        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary popppins-bold">Data Kelas</h6>
                        <a href="{{ route('admin.partner.buat') }}" class="btn btn-primary btn-sm popppins-bold">Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Partner</th>
                                    <th scope="col">Logo Partner</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $partner)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $partner->name }}</td>

                                        <td><img src="{{ asset('images_partner/' . $partner->logo) }}" alt="" width="50px"
                                                height="50px"></td>

                                        <th>
                                            <a href="{{ route('admin.partner.edit', $partner->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.partner.hapus', $partner->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            {{-- <a href="{{ route('admin.masterpartner.index', $partner->slug_url) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i></a> --}}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        {{-- ---------------------------------------------------------------------------------------------------- --}}

    </div>
@endsection
