document.addEventListener("DOMContentLoaded", function() {
    // Konfirmasi sebelum menghapus tugas
    const deleteButtons = document.querySelectorAll("a[href*='action=delete']");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            const confirmDelete = confirm("Apakah Anda yakin ingin menghapus tugas ini?");
            if (!confirmDelete) {
                event.preventDefault(); // Batalkan penghapusan jika pengguna menolak
            }
        });
    });

    // Menampilkan alert setelah tugas berhasil ditambahkan
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("added") === "true") {
        alert("Tugas berhasil ditambahkan!");
    }
});
