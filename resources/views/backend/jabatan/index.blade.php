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
          <h3 class="card-title">Data jabatan | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID Klinik</th>
              <th>Jabatan</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($jabatans as $j)
              <tr>
                <td>{{ $j->id }}</td>
                <td>{{ $j->jabatan }}</td>
                <td>
                    <a href="{{ route('jabatan.edit', $j->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  
                  </td>
              </tr>
              {{-- @endif --}}
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>ID jabatan</th>
                <th>Jabatan</th>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah jabatan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('jabatan.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama jabatan :</label>
                    <input type="text" class="form-control" id="recipient-name" name="jabatan" required>
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