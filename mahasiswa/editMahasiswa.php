<?php
  
  // Include database file
  include 'dataMahasiswa.php';

  $mahasiswaObj = new mahasiswa();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $mahasiswa = $mahasiswaObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $mahasiswaObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MODIFIKASI DATA MAHASISWA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>MODIFIKASI DATA MAHASISWA</h4>
</div><br> 

<div class="container">
  <form action="editMahasiswa.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="uname" value="<?php echo $mahasiswa['name']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Email Student:</label>
      <input type="email" class="form-control" name="uemail" value="<?php echo $mahasiswa['email']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="upname" value="<?php echo $mahasiswa['username']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="nim" value="<?php echo $mahasiswa['nim']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>