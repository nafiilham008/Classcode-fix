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
                            @role('mentor')
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 poppins-bold">
                                Total Kelas ( {{ Auth()->user()->username }} )</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 poppins-light">{{ $dataKelasMentor }}</div>
                            @endrole
                            @role('admin')
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 poppins-bold">
                                Total Kelas </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 poppins-light">{{ $dataKelas }}</div>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @role('admin')
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning border shadow h-100 py-2" style="width: 10px">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 poppins-bold">
                                Total Mentor </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 poppins-light">{{ $dataMentor }}</div>
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
                                Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 poppins-light">{{ $dataUser }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole
</div>
<!-- /.container-fluid -->
@endsection

