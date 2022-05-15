<?php

include('db.php');

if (isset($_POST['Simpan'])) {
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $tanggal = $_POST['tanggal'];
  $query = "INSERT INTO srt(id, judul, tanggal) VALUES ('$id', '$judul', '$tanggal')";
  $result = pg_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Data Berhasil Di simpan';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
