<?php
include_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/koneksi.php';

// 1. SELECT (Menampilkan semua data)
function getAllKarakter() {
    global $koneksi;
    $query = "SELECT * FROM `karakter`";
    $result = mysqli_query($koneksi, $query);
    return $result;
}
function getKarakterById($id) {
    global $koneksi;
    $id = (int)$id;
    $query = "SELECT * FROM `karakter` WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

// 2. TAMBAH (Create)
function tambahKarakter($data, $file) {
    global $koneksi;
    
    $namaFile = $file['gambar']['name'];
    $tmpName = $file['gambar']['tmp_name'];
    
    // Cek apakah file benar-benar terupload
    if (empty($namaFile)) {
        return 0; // Gagal karena gambar kosong
    }

    // Path folder (pastikan folder ini ada di direktori Anda!)
    $tujuan = __DIR__ . '/../public/assets/pics/' . $namaFile;
    
    if (move_uploaded_file($tmpName, $tujuan)) {
        // Query database
        $nama = mysqli_real_escape_string($koneksi, $data['name']);
        $occupation = mysqli_real_escape_string($koneksi, $data['occupation']);
        $home = mysqli_real_escape_string($koneksi, $data['home']);
        $deskripsi = mysqli_real_escape_string($koneksi, $data['description']);
        
        $query = "INSERT INTO `karakter` (gambar, nama, occupation, home, deskripsi) 
                  VALUES ('$namaFile', '$nama', '$occupation', '$home', '$deskripsi')";
        
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } else {
        return 0; // Gagal upload
    }
}

// 3. UPDATE
function updateKarakter($data, $file) {
    global $koneksi;
    $id = (int)$data['id'];
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $occupation = mysqli_real_escape_string($koneksi, $data['occupation']);
    $home = mysqli_real_escape_string($koneksi, $data['home']);
    $deskripsi = mysqli_real_escape_string($koneksi, $data['deskripsi']);
    $gambarLama = mysqli_real_escape_string($koneksi, $data['gambarLama']);
    
    // Cek apakah user mengupload gambar baru
    if ($file['gambar']['error'] === 4) {
        $namaFile = $gambarLama; // Jika tidak upload, pakai gambar lama
    } else {
        $namaFile = $file['gambar']['name'];
        $tmpName = $file['gambar']['tmp_name'];
        move_uploaded_file($tmpName, __DIR__ . '/../public/assets/pics/' . $namaFile);
    }
    
    $query = "UPDATE `karakter` SET 
                gambar = '$namaFile', 
                nama = '$nama', 
                occupation = '$occupation', 
                home = '$home', 
                deskripsi = '$deskripsi' 
              WHERE id = $id";
              
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi); // Mengembalikan 1 jika ada perubahan, 0 jika tidak ada yang berubah
}

// 4. HAPUS (Delete)
function hapusKarakter($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM `karakter` WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}
?>