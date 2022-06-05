@extends('layouts.backend.master')

@section('title')
    Halaman Payment Setting
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
                    <h6 class="m-0 font-weight-bold text-primary popppins-bold">Data Pembayaran</h6>
                    <a href="{{ route('admin.payment.buat') }}" class="btn btn-primary btn-sm popppins-bold">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="popppins-bold">
                                <th scope="col">#</th>
                                <th scope="col">Nama Bank / E-Wallet</th>
                                <th scope="col">Nomer Rekening</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Atas Nama</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="popppins-light">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $payment)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $payment->name }}</td>
                                    <td>{{ $payment->nomer }}</td>
                                    <td><img src="{{asset('logo_bank/'. $payment->logo)}}" alt="" width="50px"></td>
                                    <td>{{ $payment->atas_nama }}</td>
                                    <th>
                                        <a href="{{ route('admin.payment.edit', $payment->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <a href="{{ route('admin.payment.hapus', $payment->id) }}"
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
