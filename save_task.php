<?php

include('db.php');

if (isset($_POST['Simpan'])) {
  $id = $_POST['id'];
  $nomor = $_POST['nomor'];
  $merek = $_POST['merek'];
  $tipe = $_POST['tipe'];
  $query = "INSERT INTO data(id, nomor, merek, tipe) VALUES ('$id','$nomor', '$merek', '$tipe')";
  $result = pg_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Data Berhasil Di simpan';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
