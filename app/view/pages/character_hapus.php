<?php
require_once '../../../config/config.php';
require_once '../../../config/cek_auth.php'; // 1. Wajib ada di paling atas
 
// 2. Blokir jika role BUKAN admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya Admin yang berhak melakukan tindakan ini.'); document.location.href='character.php';</script>";
    exit;
}
require_once '../../../models/character.php';
 
$id = $_GET['id'];
 
if (hapusKarakter($id) > 0) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {});
        window.location.href = 'character.php?deleted=1';
    </script>";
} else {
    echo "<script>alert('Gagal menghapus karakter!'); document.location.href='character.php';</script>";
}
?>