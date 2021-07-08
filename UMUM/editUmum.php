<?php
  
  // Include database file
  include 'DataUmum.php';

  $umumObj = new umum();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $umum = $umumObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $umumObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MODIFIKASI DATA UMUM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>MODIFIKASI DATA UMUM</h4>
</div><br> 

<div class="container">
  <form action="editUmum.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="uname" value="<?php echo $umum['name']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="email">alamat email:</label>
      <input type="email" class="form-control" name="uemail" value="<?php echo $umum['email']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="upname" value="<?php echo $umum['username']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="dokumen">dokumen:</label>
      <input type="file" class="form-control" name="file" value="<?php echo $umum['dokumen']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $umum['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>