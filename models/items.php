<?php
include_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/koneksi.php';

// 1. SELECT
function getAllItems() {
    global $koneksi;
    $query = "SELECT * FROM `item`";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

// 1.5. SELECT BY ID
function getItemById($id) {
    global $koneksi;
    $id = (int)$id;
    $query = "SELECT * FROM `item` WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

// 2. TAMBAH (Create) dengan Gambar
function tambahItem($data, $file) {
    global $koneksi;
    
    // Proses Upload Gambar
    $namaFile = $file['gambar']['name'];
    $tmpName = $file['gambar']['tmp_name'];
    
    // Cek apakah gambar diupload
    if (empty($namaFile)) {
        return 0; // Gagal, gambar wajib ada
    }

    $tujuan = __DIR__ . '/../public/assets/pics/' . $namaFile;
    
    if (move_uploaded_file($tmpName, $tujuan)) {
        // Sanitasi input teks
        $nama = mysqli_real_escape_string($koneksi, $data['nama']);
        $pemilik = mysqli_real_escape_string($koneksi, $data['pemilik']);
        $abilities = mysqli_real_escape_string($koneksi, $data['abilities']);
        $deskripsi = mysqli_real_escape_string($koneksi, $data['deskripsi']);
        
        // Simpan ke database beserta nama gambarnya
        $query = "INSERT INTO `item` (gambar, nama, pemilik, abilities, deskripsi) 
                  VALUES ('$namaFile', '$nama', '$pemilik', '$abilities', '$deskripsi')";
        
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } else {
        return 0; // Gagal memindahkan file
    }
}

// 3. UPDATE
function updateItem($data, $file) {
    global $koneksi;
    $id = (int)$data['id'];
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $pemilik = mysqli_real_escape_string($koneksi, $data['pemilik']);
    $abilities = mysqli_real_escape_string($koneksi, $data['abilities']);
    $deskripsi = mysqli_real_escape_string($koneksi, $data['deskripsi']);
    $gambarLama = mysqli_real_escape_string($koneksi, $data['gambarLama']);
    
    if ($file['gambar']['error'] === 4) {
        $namaFile = $gambarLama;
    } else {
        $namaFile = $file['gambar']['name'];
        $tmpName = $file['gambar']['tmp_name'];
        move_uploaded_file($tmpName, __DIR__ . '/../public/assets/pics/' . $namaFile);
    }
    
    $query = "UPDATE `item` SET 
                gambar = '$namaFile',
                nama = '$nama', 
                pemilik = '$pemilik', 
                abilities = '$abilities', 
                deskripsi = '$deskripsi' 
              WHERE id = $id";
              
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// 4. HAPUS (Delete)
function hapusItem($id) {
    global $koneksi;
    $id = (int)$id;
    mysqli_query($koneksi, "DELETE FROM `item` WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
?>