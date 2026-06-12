<?php
require_once '../../../config/config.php';
require_once '../../../config/cek_auth.php'; // 1. Wajib ada di paling atas

// 2. Blokir jika role BUKAN admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Hanya Admin yang berhak melakukan tindakan ini.'); document.location.href='character.php';</script>";
    exit;
}
require_once '../../../models/items.php';

$id = $_GET['id'];

if (hapusItem($id) > 0) {
    echo "<script>alert('Item berhasil dihapus!'); document.location.href='items.php';</script>";
} else {    
    echo "<script>alert('Gagal menghapus item!'); document.location.href='items.php';</script>";
}
?>