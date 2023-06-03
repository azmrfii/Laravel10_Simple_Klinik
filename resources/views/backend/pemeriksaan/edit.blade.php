@extends('layouts.main')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Nama pemeriksaan : {{ $pemeriksaans->nama_pasien }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('pemeriksaan.update', $pemeriksaans->id) }}" method="post">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Pasien</label>
              <select name="nama_pasien" id="" class="form-control">
                @foreach ($pasien as $ps)
                <option value="{{ $ps->id }}">{{ $ps->nama_pasien }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Klinik</label>
              <select name="klinik" id="" class="form-control">
                @foreach ($klinik as $k)
                  <option value="{{ $k->id }}">{{ $k->nama_klinik }}</option>
              @endforeach
            </select>
            </div>
            <div class="form-group">
              <label>Nama Dokter</label>
              <select name="nama_dokter" id="" class="form-control">
                @foreach ($dokter as $d)
                  <option value="{{ $d->id }}">{{ $d->nama_dokter }}</option>
              @endforeach
            </select>
            </div>
            <div class="form-group">
              <label>TGL</label>
              <input type="date" class="form-control" name="tgl" value="{{ $pemeriksaans->tgl }}" required>
            </div>
            <div class="form-group">
              <label>hasil_penguji</label>
              <input type="text" class="form-control" name="hasil_penguji" value="{{ $pemeriksaans->hasil_penguji }}" required>
            </div>
            <div class="form-group">
              <label>biaya</label>
              <input type="number" class="form-control" name="biaya" value="{{ $pemeriksaans->biaya }}" required>
            </div>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">edit</button> |
        <a href="{{ route('pemeriksaan.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection