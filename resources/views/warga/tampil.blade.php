@extends('layouts.template')

@section('judulh1', 'Admin - Warga')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Data Warga</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Warga</label>
                <input type="text" class="form-control" id="name" name="name" placeholder=""
                    value="{{ $warga->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" class="form-control" id="umur" name="umur"
                    value="{{ $warga->umur }}" disabled>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status"
                    value="{{ $warga->status }}" disabled>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                    value="{{ $warga->pekerjaan }}" disabled>
            </div>
            <div class="form-group">
                <label for="tempat_tinggal">Alamat</label>
                <textarea id="tempat_tinggal" name="tempat_tinggal" class="form-control"
                    rows="4" disabled>{{ $warga->tempat_tinggal }}</textarea>
            </div>
            <div class="form-group">
                <label for="penghasilan">Penghasilan</label>
                <input type="text" class="form-control" id="penghasilan" name="penghasilan"
                    value="Rp {{ number_format($warga->penghasilan, 0, ',', '.') }}" disabled>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
