@extends('layouts.main')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Nama petugas : {{ $petugass->nama_petugas }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('petugas.update', $petugass->id) }}" method="post">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama petugas</label>
              <input type="text" class="form-control" name="nama_petugas" value="{{ $petugass->nama_petugas }}" required>
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select name="jabatan" id="" class="form-control">
                @foreach ($jabatan as $j)
                  <option value="{{ $j->id }}">{{ $j->jabatan }}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>JK</label>
              @if ($petugass->jk == 'Laki-laki')
              <select name="jk" id="" class="form-control" required>
                <option value="Laki-laki" selected>Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              @else
              <select name="jk" id="" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan" selected>Perempuan</option>
              </select>
              @endif
            </div>
            <div class="form-group">
              <label>No. Hp</label>
              <input type="number" class="form-control" name="no_hp" value="{{ $petugass->no_hp }}" required>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" value="{{ $petugass->username }}" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" value="{{ $petugass->password }}" required>
            </div>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">edit</button> |
        <a href="{{ route('petugas.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection