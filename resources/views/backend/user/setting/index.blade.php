@extends('layouts.backend.master')

@section('title')
    Dashboard mentor
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
                <h1>Profil Mentor</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Mentor</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.setting.update.mentor', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group poppins-bold">
                            <label for="email">Full Name</label>
                            <input type="text" class="form-control poppins-light" name="name"
                                value="{{ $data->username }}">
                        </div>
                        <div class="form-group poppins-bold">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control poppins-light" id="exampleFormControlTextarea1" rows="3" name="alamat"
                                placeholder="Fill this area">{!! $data->alamat !!}</textarea>
                        </div>
                        <div class="form-group poppins-bold">
                            <label for="email">Password</label>
                            <input type="password" class="form-control poppins-light" name="password"
                                placeholder="Input your password">
                        </div>
                        <div class="form-group poppins-bold">
                            <label for="email">Repeat Password</label>
                            <input type="password" class="form-control poppins-light" name="password_confirmation"
                                placeholder="Repeat your password">
                        </div>
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input">
                            <label class="custom-file-label popppins-bold" for="image"
                                value="{{ $data->image }}">Image</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 poppins-bold">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
