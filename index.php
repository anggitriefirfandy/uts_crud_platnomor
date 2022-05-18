<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="id" class="form-control" placeholder="no urut" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="nomor" class="form-control" placeholder="Nomor plat kendaraan" autofocus>
          </div>
          <div class="form-group">
          <input type="text" name="merek" class="form-control" placeholder="Merek kendaraan"autofocus>
          </div>
          <div class="form-group">
          <input type="text" name="tipe" class="form-control" placeholder="Tipe kendaraan(motor/mobil/truk)" autofocus>
          </div>
          <input type="submit" name="Simpan" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nomor urut</th>
            <th>Nomor plat kendaraan</th>
            <th>Merek kendaraan</th>
            <th>tipe kendaraan</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM data";
          $result_tasks = pg_query($conn, $query);    

          while($row = pg_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nomor']; ?></td>
            <td><?php echo $row['merek']; ?></td>
            <td><?php echo $row['tipe']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
