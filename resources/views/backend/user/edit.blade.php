@extends('layouts.backend.master')

@section('title')
    Halaman User Setting
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
                <h1>Daftar Pengguna</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Pengguna</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $data->email }}">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" name="name" id="fullname"
                                value="{{ $data->username }}">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection
