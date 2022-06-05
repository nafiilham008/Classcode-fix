@extends('layouts.backend.master')

@section('title')
    Edit Pembayaran
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
                <h6 class="m-0 font-weight-bold text-primary popppins-bold">Nama Bank : {{ $data->name }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.payment.update', $data->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="form-group popppins-bold">
                        <label for="email">Nama Bank / E-Wallet</label>
                        <input type="text" class="form-control popppins-light" name="name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="fullname">Nomor Rekening</label>
                        <input type="number" class="form-control popppins-light" name="nomer" value="{{ $data->nomer }}">
                    </div>
                    <div class="custom-file popppins-bold">
                        <input name="logo" type="file" class="custom-file-input">
                        <label class="custom-file-label popppins-light" for="customFile" value="{{ $data->logo }}">Logo</label>
                    </div>
                    <div class="form-group popppins-bold">
                        <label for="email">Atas Nama</label>
                        <input type="text" class="form-control popppins-light" name="atas_nama" value="{{ $data->atas_nama }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 btn-block btn-lg">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
