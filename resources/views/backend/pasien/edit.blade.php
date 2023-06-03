@extends('layouts.main')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Nama pasien : {{ $pasiens->nama_pasien }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('pasien.update', $pasiens->id) }}" method="post">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama pasien</label>
              <input type="text" class="form-control" name="nama_pasien" value="{{ $pasiens->nama_pasien }}" required>
            </div>
            <div class="form-group">
              <label>JK</label>
              @if ($pasiens->jk == 'Laki-laki')
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
              <label>TGL Lahir</label>
              <input type="date" class="form-control" name="tgl_lahir" value="{{ $pasiens->tgl_lahir }}" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" id="" cols="5" rows="3" class="form-control">{{ $pasiens->alamat }}</textarea> 
            </div>
            <div class="form-group">
              <label>No. Hp</label>
              <input type="number" class="form-control" name="no_hp" value="{{ $pasiens->no_hp }}" required>
            </div>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">edit</button> |
        <a href="{{ route('pasien.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection