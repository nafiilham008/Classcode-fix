@extends('layouts.backend.master')

@section('title')
    Halaman User Setting
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

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block fade show" role="alert">
                <strong>Gagal !</strong> {{ $pesan }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary popppins-bold">Data User</h6>
                    <a href="{{ route('admin.user.buat') }}" class="btn btn-primary btn-sm popppins-bold">Tambah</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Daftar Pada</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $user)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->name }}</td>

                                    <th>
                                        @if ($user->model_id == Auth::user()->id)
                                            <a href="{{ route('admin.user.edit', $user->model_id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        @else
                                            <a href="{{ route('admin.user.edit', $user->model_id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <a href="{{ route('admin.user.hapus', $user->model_id) }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </th>
                                </tr>
                            @endforeach
                            {{-- @foreach ($data as $user)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $role->name }}</td>
                                    
                                    <th>
                                        @if ($user->id == Auth::user()->id)
                                            <a href="{{ route('admin.user.edit', Auth::user()->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        @endif
                                        <a href="{{ route('admin.user.hapus', $user->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </th>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
