function previewGambar() {
    const file = document.getElementById("inputGambar").files[0];
    const preview = document.getElementById("imgPreview");
    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.setAttribute('src', e.target.result);
            preview.style.display = 'block'; // Tampilkan elemen img
        }

        reader.readAsDataURL(file); // Membaca file sebagai URL
    } else {
        preview.style.display = 'none'; // Sembunyikan jika tidak ada file
    }
}