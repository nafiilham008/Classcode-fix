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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary popppins-bold">Data Promo</h6>
                    <a href="{{route('admin.promo.buat')}}" class="btn btn-primary btn-sm popppins-bold">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="popppins-bold">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Kode Promo</th>
                                <th scope="col">Diskon</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="popppins-light">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $promo)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $promo->title }}</td>
                                    <td>{{ $promo->kode_promo }}</td>
                                    <td>{{ $promo->diskon }}</td>
                                    <td><img src="{{asset('images_kupon/'. $promo->image)}}" alt="" width="50px"></td>
                                    <th>
                                        <a href="{{ route('admin.promo.edit', $promo->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <a href="{{ route('admin.promo.hapus', $promo->id) }}"
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
