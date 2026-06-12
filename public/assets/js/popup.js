/**
 * Menampilkan popup "Akses Ditolak"
 * @param {string} message - Pesan yang ditampilkan
 * @param {string} redirectUrl - URL tujuan setelah klik OK
 */
function showAccessPopup(message, redirectUrl) {
    const overlay = document.getElementById('accessPopup');
    const messageEl = document.getElementById('popupMessage');
    const okBtn = document.getElementById('popupOkBtn');

    if (!overlay) return;

    messageEl.textContent = message;
    overlay.classList.add('show');

    // Pastikan body tidak bisa di-scroll selagi popup tampil
    document.body.style.overflow = 'hidden';

    okBtn.onclick = function () {
        window.location.href = redirectUrl;
    };
}