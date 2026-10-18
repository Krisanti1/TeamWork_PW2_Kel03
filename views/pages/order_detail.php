<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - SISKAN Store</title>
    <!-- Link Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-color: #f8f9fa;">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                <!-- Status Berhasil -->
                <div class="mb-3">
                    <span class="badge rounded-circle p-3" style="background-color: #E9D8FD; color: #6B46C1;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l5.002-5.998a.75.75 0 0 0-.032-1.06z"/>
                        </svg>
                    </span>
                </div>
                <h3 class="fw-bold" style="color: #6B46C1;">Pesanan Berhasil Dibuat!</h3>
                <p class="text-muted small">ID Pesanan: #SK-20261018-001</p>

                <hr class="my-4">

                <!-- Struk Rincian Pesanan -->
                <div class="text-start mb-4">
                    <h6 class="fw-bold mb-3" style="color: #553C9A;">Rincian Pesanan:</h6>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>2x Tahu Goreng Crispy</span>
                        <span class="fw-semibold">Rp 10.000</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>1x Es Teh Manis</span>
                        <span class="fw-semibold">Rp 3.000</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-muted small">
                        <span>Biaya Layanan Kantin</span>
                        <span>Rp 1.000</span>
                    </div>
                    
                    <hr>
                    <div class="d-flex justify-content-between fw-bold fs-5">
                        <span>Total Bayar:</span>
                        <span style="color: #B83280;">Rp 14.000</span>
                    </div>
                </div>

                <!-- Petunjuk Pembayaran -->
                <div class="p-3 mb-4 rounded-3 text-start small" style="background-color: #E9D8FD; color: #553C9A;">
                    <strong>Petunjuk:</strong> Tunjukkan halaman ini atau sebutkan ID Pesanan ke kasir kantin untuk melakukan pembayaran dan mengambil makanan.
                </div>

                <!-- Tombol Kembali -->
                <a href="/index.php?page=products" class="btn text-white w-100 py-2 rounded-pill fw-semibold" style="background-color: #B83280;">
                    Kembali ke Menu Utama
                </a>
            </div>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>