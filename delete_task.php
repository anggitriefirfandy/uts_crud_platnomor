<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM data WHERE id = $id";
  $result = pg_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Data Plat Nomor Kendaraan Berhasil Di Hapus';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
