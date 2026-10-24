<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun - SISKAN Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

<div class="card border-0 shadow-sm rounded-4 p-4" style="width: 100%; max-width: 400px;">
    <div class="text-center mb-4">
        <h3 class="fw-bold" style="color: #6B46C1;">Daftar Akun Baru</h3>
        <p class="text-muted small">Buat akun dengan Nama, Username, dan Password</p>
    </div>

    <form action="/index.php?action=register_process" method="POST">
        <div class="mb-3">
            <label class="form-label small text-muted">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control rounded-pill px-3" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-3">
            <label class="form-label small text-muted">Username</label>
            <input type="text" name="username" class="form-control rounded-pill px-3" placeholder="Buat username unik" required>
        </div>
        <div class="mb-4">
            <label class="form-label small text-muted">Password</label>
            <input type="password" name="password" class="form-control rounded-pill px-3" placeholder="Buat password" required>
        </div>
        <button type="submit" class="btn text-white w-100 rounded-pill py-2 fw-semibold mb-3" style="background-color: #B83280;">
            Daftar Sekarang
        </button>
        <p class="text-center small text-muted mb-0">
            Sudah punya akun? <a href="/index.php?page=login" class="fw-semibold text-decoration-none" style="color: #6B46C1;">Login di sini</a>
        </p>
    </form>
</div>

</body>
</html>