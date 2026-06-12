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

    document.body.style.overflow = 'hidden';

    okBtn.onclick = function () {
        window.location.href = redirectUrl;
    };
}

/**
 * Menampilkan popup konfirmasi hapus
 * @param {string} name - Nama item/karakter yang akan dihapus
 * @param {string} deleteUrl - URL untuk eksekusi penghapusan
 */
function showDeletePopup(name, deleteUrl) {
    const overlay = document.getElementById('deletePopup');
    const nameEl = document.getElementById('deletePopupName');
    const confirmBtn = document.getElementById('deletePopupConfirmBtn');

    if (!overlay) return;

    nameEl.textContent = name;
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';

    confirmBtn.onclick = function () {
        window.location.href = deleteUrl;
    };
}

function hideDeletePopup() {
    const overlay = document.getElementById('deletePopup');
    if (!overlay) return;
    overlay.classList.remove('show');
    document.body.style.overflow = '';
}

/**
 * Menampilkan popup berhasil dihapus, lalu redirect
 * @param {string} message - Pesan sukses
 * @param {string} redirectUrl - URL tujuan setelah klik OK
 */
function showSuccessPopup(message, redirectUrl) {
    const overlay = document.getElementById('successPopup');
    const messageEl = document.getElementById('successPopupMessage');
    const okBtn = document.getElementById('successPopupOkBtn');

    if (!overlay) return;

    messageEl.textContent = message;
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';

    okBtn.onclick = function () {
        window.location.href = redirectUrl;
    };
}