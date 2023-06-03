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
          <h3 class="card-title">Data Dokter | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nama Dokter</th>
              <th>JK</th>
              <th>Alamat</th>
              <th>TGL Lahir</th>
              <th>Spesialis</th>
              <th>No. Hp</th>
              <th>Email</th>
              <th>Username</th>
              <th>Password</th>
              <th>Klinik</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($dokters as $d)
              <tr>
                <td>{{ $d->nama_dokter }}</td>
                <td>{{ $d->jk }}</td>
                <td>{{ $d->alamat }}</td>
                <td>{{ $d->tgl_lahir }}</td>
                <td>{{ $d->spesialis }}</td>
                <td>{{ $d->no_hp }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->password }}</td>
                <td>{{ $d->klinik }}</td>
                <td>
                    <form action="{{ route('dokter.destroy', $d->id) }}" method="POST">
                        {{-- <a data-bs-toggle="modal" data-bs-target="#image {{ $k->id }}" class="btn btn-info"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a> --}}
                        <a href="{{ route('dokter.edit', $d->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $d->nama_dokter }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      </form>
                  
                  </td>
              </tr>
              {{-- @endif --}}
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Nama Dokter</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>TGL Lahir</th>
                <th>Spesialis</th>
                <th>No. Hp</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Klinik</th>
                <th>Action</th>
            </tr>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah dokter</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('dokter.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama dokter :</label>
                    <input type="text" class="form-control" id="recipient-name" name="nama_dokter" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">JK :</label>
                    <select name="jk" id="" class="form-control" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Alamat :</label>
                    <textarea name="alamat" id="" cols="5" rows="3" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">TGL Lahir :</label>
                    <input type="date" class="form-control" id="recipient-name" name="tgl_lahir" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Spesialis :</label>
                    <input type="text" class="form-control" id="recipient-name" name="spesialis" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">No. Hp :</label>
                    <input type="number" class="form-control" id="recipient-name" name="no_hp" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Email :</label>
                    <input type="email" class="form-control" id="recipient-name" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Username :</label>
                    <input type="text" class="form-control" id="recipient-name" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Password :</label>
                    <input type="password" class="form-control" id="recipient-name" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Klinik :</label>
                    <select name="klinik" id="" class="form-control">
                        @foreach ($klinik as $k)
                          <option value="{{ $k->id }}">{{ $k->nama_klinik }}</option>
                      @endforeach
                    </select>
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