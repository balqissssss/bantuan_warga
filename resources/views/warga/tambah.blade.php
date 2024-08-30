@extends('layouts.template')
@section('judulh1','Admin - warga')

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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Customer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('warga.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="umur">umur</label>
                    <input type="number" class="form-control" id="umur" name="umur">
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                </div>
                
                <div class="form-group">
                    <label for="tempat_tinggal">Alamat</label>
                    <textarea id="tempat_tinggal" name="tempat_tinggal" class=" form-control" rows="4"></textarea>
                </div>
                <div class="penghasilan">
                    <label for="penghasilan">penghasilan</label>
                    <input type="text" class="form-control" id="penghasilan" name="penghasilan">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection