@extends('layout')

@section('content')
<div class="container">
    <h1 class="text-center">Data Sewa Alat Music</h1>
    <a href="{{ route('music.create') }}" class="btn btn-warning mb-4">Tambah Jadwal</a>
    <a href="{{ route('music.pdf') }}" class="btn btn-danger mb-4">Cetak PDF</a>
    

    <form action="{{ route('music.search') }}" method="GET" class="mb-3 d-flex">
    <input type="text" name="keyword" class="form-control me-2"
           placeholder="Cari nama atau alat musik...">
    <button type="submit" class="btn btn-primary">Cari</button>
</form>

    <table id="table_music" class="table table-striped">
        <thead>
            <tr>
                <th>Nama Penyewa</th>
                <th>Nama Alat Musik</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Harga Sewa</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($music as $item)
            <tr>
                <td>{{ $item->nama_penyewa }}</td>
                <td>{{ $item->nama_alat_musik }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->harga_sewa }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('music.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('music.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <footer class="text-center py-4">
        <span>&copy; 2024 | Aditya </span>
    </footer>
</div>
@endsection