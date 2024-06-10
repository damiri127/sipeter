@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card" id="card-informasi-struktur-jabatan">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h2>Data Struktur Jabatan</h2>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('create_jabatan') }}" class="btn btn-md btn-success">Tambah</a>
                    </div>
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputModal">
                        Input Details
                    </button>
                    
                    <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="inputModalLabel">Enter Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_struktur_jabatan}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$item->id_struktur_jabatan}}">Info</a>
                                        {{-- Modal start --}}
                                        <div class="modal fade" id="exampleModalCenter{{$item->id_struktur_jabatan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLongTitle">Data Struktur Jabatan</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <td>:</td>
                                                            <td>{{ $loop->iteration }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Nama</th>
                                                            <td>:</td>
                                                            <td> {{$item->nama_struktur_jabatan}} </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="#" class="btn btn-warning">Edit Data</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        {{-- Modal end --}}
                                        <a href="/admin/data-struktur-jabatan/edit/{{ $item->id_struktur_jabatan }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/admin/data-struktur-jabatan/delete/{{ $item->id_struktur_jabatan }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection