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
                    <h4>Edit Role Pengguna</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update.role', $data->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Pilih Role</label>
                            <select class="form-control" name="role">
                                @foreach ($dataRole as $item)
                                    <option>{{ $item->name }}</option>
                                @endforeach
                            </select>
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
