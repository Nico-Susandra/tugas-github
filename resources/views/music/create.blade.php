@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Tambah Data Alat Musik</h1>
    <form action="{{ route('music.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
            <input type="text" class="form-control @error('nama_penyewa') is-invalid @enderror" id="nama_penyewa" name="nama_penyewa" value="{{ old('nama_penyewa') }}">
            @error('nama_penyewa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_alat_musik" class="form-label">Nama Alat Musik</label>
            <input type="text" class="form-control @error('nama_alat_musik') is-invalid @enderror" id="nama_alat_musik" name="nama_alat_musik" value="{{ old('nama_alat_musik') }}">
            @error('nama_alat_musik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
            @error('tanggal_pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
            @error('tanggal_kembali')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_sewa" class="form-label">Harga Sewa</label>
            <input type="number" step="0.01" class="form-control @error('harga_sewa') is-invalid @enderror" id="harga_sewa" name="harga_sewa" value="{{ old('harga_sewa') }}">
            @error('harga_sewa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('music.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
