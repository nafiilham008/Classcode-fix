@extends('layouts.backend.master')

@section('title')
    Tambah Pembayaran
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
                <h1>Daftar Partner</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Partner</h4>
                </div>
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
                        <div class="form-group">
                            <h6><label for="image">Gambar</label></h6>
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="form-group mt-3 popppins-bold">
                            <label for="exampleInputEmail1">Atas Nama</label>
                            <input name="atas_nama" type="text" class="form-control popppins-light">
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
