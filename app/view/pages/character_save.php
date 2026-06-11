<?php require_once '../../../config/config.php' ?>

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: character.php');
    exit;
}

$base     = realpath(__DIR__ . '/../../..');
$jsonPath = $base . '/data/characters.json';
$json     = file_get_contents($jsonPath);
$data     = json_decode($json, true);

// Buat id dari nama (spasi → strip, huruf kecil)
$id = strtolower(str_replace(' ', '-', trim($_POST['name'])));

// Handle upload gambar
$imageName = 'default.png';
if (!empty($_FILES['image']['name'])) {
    $ext       = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = $id . '.' . $ext;
    $uploadDir = $base . '/public/assets/pics/';
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
}

// Tambah karakter baru ke array
$data['characters'][] = [
    'id'          => $id,
    'name'        => htmlspecialchars($_POST['name']),
    'occupation'  => htmlspecialchars($_POST['occupation']),
    'home'        => htmlspecialchars($_POST['home']),
    'species'     => htmlspecialchars($_POST['species']),
    'image'       => $imageName,
    'description' => htmlspecialchars($_POST['description'])
];

// Simpan kembali ke JSON
file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT));

header('Location: character.php');
exit;
?>