<?php
include("db.php");
$id = '';
$judul= '';
$tanggal = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM srt WHERE id=$id";
  $result = pg_query($conn, $query);
  if (pg_num_rows($result) == 1) {
    $row = pg_fetch_array($result);
    $id = $row['id'];
    $judul = $row['judul'];
    $tanggal = $row['tanggal'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $id= $_POST['id'];
  $judul = $_POST['judul'];
  $tanggal = $_POST['tanggal'];

  $query = "UPDATE srt set id = '$id', judul = '$judul', tanggal = '$tanggal' WHERE id=$id";
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
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="id" type="text" class="form-control" value="<?php echo $id; ?>" placeholder="Ubah Nomor">
        </div>
        <div class="form-group">
        <textarea name="judul" class="form-control" cols="30" rows="10"><?php echo $judul;?></textarea>
        </div>
        <div class="form-group">
            <input type="date" name="tanggal" class="form-control"><?php echo $tanggal;?>
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
