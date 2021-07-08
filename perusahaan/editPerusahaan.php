<?php
  
  // Include database file
  include 'dataPerusahaan.php';

  $perusahaanObj = new perusahaan();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $perusahaan = $perusahaanObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $perusahaanObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Info Persusahaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Update Info Persusahaan</h4>
</div><br> 

<div class="container">
  <form action="editPerusahaan.php" method="POST">
  <div class="form-group">
      <label for="nama">Nama:</label>
      <input type="text" class="form-control" name="uname" value="<?php echo $perusahaan['nama']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="bidang">Bidang:</label>
      <input type="text" class="form-control" name="updname" value="<?php echo $perusahaan['bidang']; ?>" required="">
    </div>
    
    <div class="form-group">
      <label for="username">lowongan:</label>
      <input type="text" class="form-control" name="upname" value="<?php echo $perusahaan['lowongan']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="kode" value="<?php echo $perusahaan['kode']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>