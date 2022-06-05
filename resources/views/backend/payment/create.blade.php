@extends('layouts.backend.master')

@section('title')
    Tambah Pembayaran
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
                <form action="{{ route('admin.payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group popppins-bold">
                        <label for="exampleInputEmail1">Nama Bank / E-Wallet</label>
                        <input name="name" type="text" class="form-control popppins-light">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="exampleInputPassword1">Nomor Rekening</label>
                        <input name="nomer" type="number" class="form-control popppins-light">
                    </div>
                    <div class="custom-file popppins-bold">
                        <input name="logo" type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Logo</label>
                    </div>
                    <div class="form-group mt-3 popppins-bold">
                        <label for="exampleInputEmail1">Atas Nama</label>
                        <input name="atas_nama" type="text" class="form-control popppins-light">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 popppins-bold btn-block btn-lg">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection


