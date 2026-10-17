// Script interaktif untuk halaman produk SISKAN Store
document.addEventListener('DOMContentLoaded', function () {
    // Ambil semua tombol pesan
    const pesanButtons = document.querySelectorAll('.btn-pesan');

    pesanButtons.forEach(button => {
        button.addEventListener('click', function () {
            const namaProduk = this.getAttribute('data-nama');
            
            // Tampilkan alert / notifikasi sederhana
            alert(`Berhasil! Menu "${namaProduk}" telah ditambahkan ke keranjang pesanan.`);
        });
    });
});