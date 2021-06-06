<?php

require 'functions.php';

// jika tidak ada id di URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
      alert('Data berhasil diubah');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo "Data gagal diubah";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Ubah Data Mahasiswa</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Id:
          <input type="number" name="id" autofocus required value="<?= $m['id']; ?>">
        </label>
      </li>

      <li>
        <label>
          Nama:
          <input type="text" name="nama" required value="<?= $m['nama']; ?>">
        </label>
      </li>

      <li>
        <label>
          NIM:
          <input type="text" name="nim" required value="<?= $m['nim']; ?>">
        </label>
      </li>

      <li>
        <label>
          Email:
          <input type="text" name="email" required value="<?= $m['email']; ?>">
        </label>
      </li>

      <li>
        <label>
          Jurusan:
          <input type="text" name="jurusan" required value="<?= $m['jurusan']; ?>">
        </label>
      </li>

      <li>
        <label>
          Gambar:
          <input type="text" name="gambar" required value="<?= $m['gambar']; ?>">
        </label>
      </li>

      <li>
        <button type="submit" name="ubah">Ubah data</button>
      </li>
    </ul>
  </form>
</body>

</html>