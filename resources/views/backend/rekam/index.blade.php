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
          <h3 class="card-title">Data rekam | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nama pasien</th>
                <th>keluhan</th>
                <th>TGL</th>
                <th>Nama Dokter</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($rekams as $r)
              <tr>
                  <td>{{ $r->nama_pasien }}</td>
                  <td>{{ $r->keluhan }}</td>
                  <td>{{ $r->tgl }}</td>
                  <td>{{ $r->nama_dokter }}</td>
                <td>
                    <form action="{{ route('rekam.destroy', $r->id) }}" method="POST">
                      {{-- <a data-bs-toggle="modal" data-bs-target="#image {{ $r->id }}" class="btn btn-info"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a> --}}
                     <a href="{{ route('rekam.edit', $r->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $r->nama_pasien }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                  </td>
              </tr>
              {{-- @endif --}}
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Nama pasien</th>
                <th>keluhan</th>
                <th>TGL</th>
                <th>Nama Dokter</th>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah rekam</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('rekam.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Pasien :</label>
                    <select name="nama_pasien" id="" class="form-control">
                        @foreach ($pasien as $ps)
                        <option value="{{ $ps->id }}">{{ $ps->nama_pasien }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Keluhan :</label>
                    <input type="text" class="form-control" id="recipient-name" name="keluhan" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">TGL :</label>
                    <input type="date" class="form-control" id="recipient-name" name="tgl" required>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Dokter :</label>
                    <select name="nama_dokter" id="" class="form-control">
                        @foreach ($dokter as $d)
                          <option value="{{ $d->id }}">{{ $d->nama_dokter }}</option>
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