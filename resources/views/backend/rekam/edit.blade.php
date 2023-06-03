@extends('layouts.main')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Nama rekam : {{ $rekams->nama_rekam }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('rekam.update', $rekams->id) }}" method="post">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama Pasien :</label>
              <select name="nama_pasien" id="" class="form-control">
                  @foreach ($pasien as $ps)
                  <option value="{{ $ps->id }}">{{ $ps->nama_pasien }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Keluhan :</label>
              <input type="text" class="form-control" id="recipient-name" name="keluhan" required value="{{ $rekams->keluhan }}">
            </div>
            <div class="form-group">
              <label>TGL</label>
              <input type="date" class="form-control" name="tgl" value="{{ $rekams->tgl }}" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama Dokter :</label>
              <select name="nama_dokter" id="" class="form-control">
                  @foreach ($dokter as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_dokter }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">edit</button> |
        <a href="{{ route('rekam.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection