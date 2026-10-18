<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - SISKAN Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card border-0 shadow-sm rounded-4 p-4" style="width: 380px;">
        <h3 class="fw-bold text-center mb-4" style="color: #6B46C1;">Daftar Akun</h3>
        <form action="/index.php?action=register_process" method="POST">
            <div class="mb-3">
                <label class="form-label small text-muted">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3">
                <label class="form-label small text-muted">Email</label>
                <input type="email" name="email" class="form-control rounded-pill" required>
            </div>
            <div class="mb-3">
                <label class="form-label small text-muted">Password</label>
                <input type="password" name="password" class="form-control rounded-pill" required>
            </div>
            <button type="submit" class="btn text-white w-100 rounded-pill py-2 fw-semibold mb-3" style="background-color: #B83280;">Daftar</button>
            <p class="text-center small text-muted">Sudah punya akun? <a href="/index.php?page=login" style="color: #6B46C1;">Login di sini</a></p>
        </form>
    </div>
</body>
</html>