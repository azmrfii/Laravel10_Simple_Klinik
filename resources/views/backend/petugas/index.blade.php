@extends('layouts.main')
@section('content')
<div class="container py-3">
    @if (Session::get('alert'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('alert') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data petugas | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nama Petugas</th>
                <th>Jabatan</th>
                <th>JK</th>
                <th>No. Hp</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($petugass as $p)
              <tr>
                  <td>{{ $p->nama_petugas }}</td>
                  <td>{{ $p->jabatan }}</td>
                  <td>{{ $p->jk }}</td>
                  <td>{{ $p->no_hp }}</td>
                  <td>{{ $p->username }}</td>
                  <td>{{ $p->password }}</td>
                <td>
                    <form action="{{ route('petugas.destroy', $p->id) }}" method="POST">
                      {{-- <a data-bs-toggle="modal" data-bs-target="#image {{ $p->id }}" class="btn btn-info"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a> --}}
                     <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $p->nama_petugas }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                  </td>
              </tr>
              {{-- @endif --}}
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Nama Petugas</th>
                <th>Jabatan</th>
                <th>JK</th>
                <th>No. Hp</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah petugas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('petugas.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama petugas :</label>
                    <input type="text" class="form-control" id="recipient-name" name="nama_petugas" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Jabatan :</label>
                    <select name="jabatan" id="" class="form-control">
                        @foreach ($jabatan as $j)
                          <option value="{{ $j->id }}">{{ $j->jabatan }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">JK :</label>
                    <select name="jk" id="" class="form-control" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">No. Hp :</label>
                    <input type="number" class="form-control" id="recipient-name" name="no_hp" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Username :</label>
                    <input type="text" class="form-control" id="recipient-name" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Password :</label>
                    <input type="password" class="form-control" id="recipient-name" name="password" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection