@extends('layouts.backend.master')

@section('title')
    Halaman Pending Kelas
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
                <h1>Daftar Pending</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Data Pending Pelanggan</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.payment.buat') }}" class="btn btn-icon icon-right btn-primary"><i
                                class="far fa-add"></i>
                            Tambah</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Nama Mentor</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Bukti Transfer</th>
                                    <th scope="col"></th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $pending)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $pending->title }}</td>
                                        <td>{{ $pending->harga }}</td>
                                        <td><span class="badge badge-success">{{ $pending->id_user }}</span></td>
                                        <td>{{ $pending->username }}</td>
                                        <td>{{ $pending->status }}</td>
                                        <td><img src="{{ asset('images_trx/' . $pending->image_trx) }}" alt=""
                                                width="50px"></td>
                                        <th>
                                            <div class="card-header-action">
                                                <a type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    href="{{ url('admin/pending', $pending->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @foreach ($data as $pending)
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fs-5 poppins-light" id="exampleModalLabel">Pending Status</h4>
                    </div>
                    <form action="{{ route('admin.pending.kelas.update', $pending->id) }}" method="POST">
                        {{-- <form action="/admin/pending/update/{{ $data->id }}"> --}}
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header">
                                    <h6><label for="">Bukti Transaksi</label></h6>
                                </div>
                                <img src="{{ asset('images_trx/' . $pending->image_trx) }}" alt="">
                            </div>
                            <select class="form-control" name="status">
                                <option value="pending">Pending</option>
                                <option value="done">Sukses</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

{{-- @section('css-tambahan')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection --}}

@section('js-tambahan')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
@endsection
