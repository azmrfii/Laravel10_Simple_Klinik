@extends('layouts.main')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit jabatan : {{ $jabatans->jabatan }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('jabatan.update', $jabatans->id) }}" method="post">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama jabatan</label>
              <input type="text" class="form-control" name="jabatan" value="{{ $jabatans->jabatan }}" required>
            </div>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">edit</button> |
        <a href="{{ route('jabatan.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection