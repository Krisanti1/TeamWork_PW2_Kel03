<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu - SISKAN Store</title>
    <!-- Link Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-color: #f8f9fa;">

<div class="container my-5">
    <a href="/index.php?url=products" class="btn btn-outline-secondary mb-4">&larr; Kembali ke Daftar Menu</a>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-4">
        <div class="row g-4 align-items-center">
            <!-- Gambar Produk -->
            <div class="col-md-5 text-center">
                <img src="/tahugoreng.jpg" 
                     class="img-fluid rounded-4 shadow-sm" 
                     alt="Tahu Goreng Crispy"
                     style="max-height: 350px; width: 100%; object-fit: cover;"
                     onerror="this.src='https://via.placeholder.com/400x300?text=Detail+Menu';">
            </div>

            <!-- Detail Produk -->
            <div class="col-md-7">
                <span class="badge mb-2 px-3 py-2 rounded-pill" style="background-color: #E9D8FD; color: #553C9A;">
                    Cemilan
                </span>
                <h2 class="fw-bold text-dark mt-2">Tahu Goreng Crispy</h2>
                <h3 class="fw-bold my-3" style="color: #B83280;">Rp 5.000</h3>
                <p class="text-muted fs-6">
                    Tahu goreng renyah gurih yang dibuat dari tahu pilihan berkualitas, disajikan hangat dengan cocolan sambal kecap pedas gurih khas kantin kampus.
                </p>

                <hr class="my-4">

                <!-- Form Pilihan Tambahan / Jumlah -->
                <div class="d-flex align-items-center gap-3 mb-4">
                    <label for="jumlah" class="fw-semibold">Jumlah:</label>
                    <input type="number" id="jumlah" class="form-control w-25 rounded-pill text-center" value="1" min="1">
                </div>

                <div class="d-flex gap-2">
                    <button class="btn text-white px-4 py-2 rounded-pill fw-semibold btn-pesan" 
                            style="background-color: #B83280;" 
                            data-nama="Tahu Goreng Crispy">
                        + Tambahkan ke Keranjang
                    </button>
                    <a href="/index.php?url=cart" class="btn btn-outline-purple px-4 py-2 rounded-pill fw-semibold" style="border-color: #6B46C1; color: #6B46C1;">
                        Lihat Keranjang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>