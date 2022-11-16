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
        <section class="section">
            <div class="section-header">
                <h1>Daftar Pengguna</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Lengkap</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.user.buat') }}" class="btn btn-icon icon-right btn-primary"><i class="far fa-add"></i>
                            Tambah</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Daftar Pada</th>
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
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
                                        <td>
                                            <span class="badge badge-success">{{ $user->name }}</span>
                                        </td>
                                        <th>
                                            <div class="card-header-action">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown"
                                                        class="btn btn-warning dropdown-toggle"
                                                        aria-expanded="false">Aksi</a>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(-60px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        @if ($user->model_id == Auth::user()->id)
                                                            <a href="{{ route('admin.user.edit', $user->model_id) }}"
                                                                class="dropdown-item has-icon"><i class="far fa-edit"></i>
                                                                Edit</a>
                                                        @else
                                                            <a href="{{ route('admin.user.edit', $user->model_id) }}"
                                                                class="dropdown-item has-icon"><i class="far fa-edit"></i>
                                                                Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="{{ route('admin.user.hapus', $user->model_id) }}"
                                                                class="dropdown-item has-icon text-danger trigger--fire-modal-7"
                                                                data-confirm="Hapus Data?|Anda yakin akan menghapus data?"
                                                                data-confirm-yes="event.preventDefault();
                                                                document.getElementById('delete').submit();">
                                                                <form id="delete"
                                                                    action="{{ route('admin.user.hapus', $user->model_id) }}"
                                                                    method="GET" class="d-none">
                                                                    @csrf
                                                                </form>
                                                                <i class="far fa-trash-alt"></i>
                                                                Delete
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js-tambahan')
    {{-- <script>
        function loadDeleteModal(id) {
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
        }

        function confirmDelete(id) {
            $.ajax({
                url: '{{ url('user/hapus') }}/' + id,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method': 'delete',
                },
                success: function(data) {
                    // Success logic goes here..!
                    
                },
                error: function(error) {
                    // Error logic goes here..!
                }
            });
        }
    </script> --}}
@endsection
