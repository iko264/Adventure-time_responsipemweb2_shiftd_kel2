<!-- Access Denied Popup -->
<div class="popup-overlay" id="accessPopup">
    <div class="popup-box">
        <div class="popup-icon">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <h3 class="popup-title">Akses Ditolak!</h3>
        <p class="popup-message" id="popupMessage">
            Guest tidak dapat mengakses halaman ini.
        </p>
        <button type="button" class="popup-btn" id="popupOkBtn">OK</button>
    </div>
</div>

<!-- Delete Confirmation Popup -->
<div class="popup-overlay" id="deletePopup">
    <div class="popup-box">
        <div class="popup-icon popup-icon--danger">
            <i class="fa-solid fa-trash-can"></i>
        </div>
        <h3 class="popup-title">Konfirmasi Hapus</h3>
        <p class="popup-message">
            Apakah kamu yakin ingin menghapus<br>
            <strong id="deletePopupName"></strong>?<br>
            Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="popup-actions">
            <button type="button" class="popup-btn popup-btn--outline" onclick="hideDeletePopup()">Batal</button>
            <button type="button" class="popup-btn popup-btn--danger" id="deletePopupConfirmBtn">Ya, Hapus</button>
        </div>
    </div>
</div>

<!-- Success Popup -->
<div class="popup-overlay" id="successPopup">
    <div class="popup-box">
        <div class="popup-icon popup-icon--success">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <h3 class="popup-title">Berhasil Dihapus!</h3>
        <p class="popup-message" id="successPopupMessage">
            Data telah berhasil dihapus dari database.
        </p>
        <button type="button" class="popup-btn popup-btn--success" id="successPopupOkBtn">OK</button>
    </div>
</div>

<script src="<?= BASE_URL ?>public/assets/js/popup.js"></script>