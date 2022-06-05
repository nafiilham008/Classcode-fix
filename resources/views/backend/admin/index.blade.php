@extends('layouts.backend.master')

@section('title')
    Halaman Admin 
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4 ">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 poppins-bold">
                                Total Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 poppins-light">{{ $dataKelas }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 poppins-bold">
                                Total Kupon</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 poppins-light">{{ $dataPromo }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 poppins-bold">
                                Total User </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 poppins-light">{{ $dataUser }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
@endsection

