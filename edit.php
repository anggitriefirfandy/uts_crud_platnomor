<?php
include("db.php");
$id = '';
$nomor = '';
$merek= '';
$tipe = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM data WHERE id=$id";
  $result = pg_query($conn, $query);
  if (pg_num_rows($result) == 1) {
    $row = pg_fetch_array($result);
    $id = $row['id'];
    $nomor = $row['nomor'];
    $merek = $row['merek'];
    $tipe = $row['tipe'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $id= $_POST['id'];
  $nomor= $_POST['nomor'];
  $merek = $_POST['merek'];
  $tipe = $_POST['tipe'];

  $query = "UPDATE data set id = '$id', nomor = '$nomor', merek = '$merek', tipe = '$tipe' WHERE id=$id";
  pg_query($conn, $query);
  $_SESSION['message'] = 'Data Berhasil Di Ubah';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <h3>Semua kolom wajib diisi</h3>
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="id" type="text" class="form-control" value="<?php echo $id; ?>" placeholder="Ubah Nomor urut">
        </div>
        <div class="form-group">
          <input type="text" name="nomor" class="form-control"><?php echo $nomor;?>
          </div>
          <div class="form-group">
          <input type="text" name="merek" class="form-control"><?php echo $merek;?>
          </div>
        <div class="form-group">
          <input type="text" name="tipe" class="form-control"><?php echo $tipe;?>
          </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
