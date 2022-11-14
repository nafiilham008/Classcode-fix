@extends('layouts.dashboard.master')

@section('title')
    Dashboard User
@endsection

@section('content')

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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary poppins-bold">Nama User : {{ $data->username }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.setting.update', $data->id) }}" method="POST">
                @csrf
                @method("PATCH")
                <div class="form-group poppins-bold">
                    <label for="email">Full Name</label>
                    <input type="text" class="form-control poppins-light" name="name" value="{{ $data->username }}">
                </div>
                <div class="form-group poppins-bold">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control poppins-light" id="exampleFormControlTextarea1" rows="3" name="alamat" placeholder="Fill this area">{!! $data->alamat !!}</textarea>
                  </div>
                <div class="form-group poppins-bold">
                    <label for="email">Password</label>
                    <input type="password" class="form-control poppins-light" name="password" placeholder="Input your password">
                </div>
                <div class="form-group poppins-bold">
                    <label for="email">Repeat Password</label>
                    <input type="password" class="form-control poppins-light" name="password_confirmation" placeholder="Repeat your password">
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 poppins-bold">Submit</button>
            </form>
        </div>
    </div>

@endsection
