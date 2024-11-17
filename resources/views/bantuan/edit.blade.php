@extends('layouts.template')

@section('judulh1', 'Admin - Bantuan')

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

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Bantuan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('bantuan.update', $bantuan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="id_warga">Nama Warga</label>
                    <select id="id_warga" name="id_warga" class="form-control" disabled>
                        @foreach($warga as $warga)
                        <option value="{{ $warga->id }}" {{ $warga->id == $bantuan->id_warga ? 'selected' : '' }}>
                            {{ $warga->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="total_bantuan">Total Bantuan</label>
                    <input type="number" id="total_bantuan" name="total_bantuan" class="form-control" value="{{ $bantuan->total_bantuan }}" required>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
