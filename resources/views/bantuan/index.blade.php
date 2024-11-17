@extends('layouts.template')

@section('judulh1', 'Tambah Data Bantuan')

@section('konten')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Data Bantuan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('bantuan.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="id_warga">Nama Warga</label>
                    <select id="id_warga" name="id_warga" class="form-control" required>
                        @foreach($warga as $warga)
                        <option value="{{ $warga->id }}">{{ $warga->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="total_bantuan">Total Bantuan</label>
                    <input type="number" id="total_bantuan" name="total_bantuan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Bantuan</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
