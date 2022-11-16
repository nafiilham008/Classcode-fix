@extends('layouts.dashboard.master')

@section('title')
    Pengaturan
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
        <section class="section">
            <div class="section-header">
                <h1>Pengaturan</h1>
            </div>
            <form action="{{ route('dashboard.setting.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h6><label for="name">Nama Pelanggan</label></h6>
                            <input type="text" class="form-control" name="name" value="{{ $data->username }}"
                                placeholder="Silahkan isi nama anda">
                        </div>
                        <div class="form-group">
                            <h6><label for="name">Alamat</label></h6>
                            <textarea class="form-control" name="alamat" placeholder="Silahkan isi alamat anda">{!! $data->alamat !!}</textarea>
                        </div>
                        <div class="form-group">
                            <h6><label for="inputPassword6">Kata Sandi</label></h6>
                            <input type="password" id="inputPassword5" class="form-control"
                                aria-describedby="passwordHelpBlock" name="password" placeholder="Minimal 8 karakter">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Silahkan isi jika ingin ubah kata sandi
                            </small>
                        </div>
                        <div class="form-group">
                            <h6><label for="inputPassword6">Konfirmasi Kata Sandi</label></h6>
                            <input type="password" id="inputPassword5" class="form-control"
                                aria-describedby="passwordHelpBlock" name="password_confirmation"
                                placeholder="Minimal 8 karakter">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1 btn-block" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </section>
    </div>


@endsection
