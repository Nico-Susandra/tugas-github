<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Besar RekWeb Adit</title>
    <!-- Bootstrap CSS (via CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- DataTables CSS (via CDN) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <style>.logout-container {
    margin-top: 50px; /* Atur sesuai kebutuhan */
}</style>
</head>
<body class="d-flex flex-column h-100">

<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-fixed-top bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Adit Music</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('music.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('music.create') }}">Cek Sewa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chat Admin</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
<main class="flex-shrink-0">
    <div class="container mt-5">
        <!-- Notifikasi untuk sukses dan error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

      <!-- Tombol Logout -->
<div class="d-flex justify-content-end mb-4 logout-container"> <!-- Menambahkan kelas logout-container -->
    @if(Auth::check())
        <div class="d-flex align-items-center">
            <span class="me-3">Selamat datang, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        </div>
    @endif
</div>

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <main class="px-3">
                @yield('content') <!-- Tempat untuk konten dinamis -->
            </main>
        </div>
    </div>
</main>

<!-- jQuery (required for DataTables and Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap Bundle JS (with Popper.js) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS (via CDN) -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table_music').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthChange: true,
        });
    });
</script>
</body>
</html>