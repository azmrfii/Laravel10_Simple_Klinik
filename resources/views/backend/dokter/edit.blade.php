@extends('layouts.main')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Nama dokter : {{ $dokters->nama_dokter }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('dokter.update', $dokters->id) }}" method="post">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama dokter</label>
              <input type="text" class="form-control" name="nama_dokter" value="{{ $dokters->nama_dokter }}" required>
            </div>
            <div class="form-group">
              <label>JK</label>
              @if ($dokters->jk == 'Laki-laki')
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
              <label>Alamat</label>
              <textarea name="alamat" id="" cols="5" rows="3" class="form-control">{{ $dokters->alamat }}</textarea> 
            </div>
            <div class="form-group">
              <label>TGL Lahir</label>
              <input type="date" class="form-control" name="tgl_lahir" value="{{ $dokters->tgl_lahir }}" required>
            </div>
            <div class="form-group">
              <label>Spesialis</label>
              <input type="text" class="form-control" name="spesialis" value="{{ $dokters->spesialis }}" required>
            </div>
            <div class="form-group">
              <label>No. Hp</label>
              <input type="number" class="form-control" name="no_hp" value="{{ $dokters->no_hp }}" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" value="{{ $dokters->email }}" required>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" value="{{ $dokters->username }}" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" value="{{ $dokters->password }}" required>
            </div>
            <div class="form-group">
              <label>Klinik</label>
              <select name="klinik" id="" class="form-control">
                @foreach ($klinik as $k)
                  <option value="{{ $k->id }}">{{ $k->nama_klinik }}</option>
                @endforeach
                </select>
              </div>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">edit</button> |
        <a href="{{ route('dokter.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection