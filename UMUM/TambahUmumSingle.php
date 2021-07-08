<?php

  // Include database file
  include 'DataUmum.php';

  $umumObj = new umum();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $umumObj->insertData($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>REGISTRASI DATA UMUM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>REGISTRASI DATA UMUM</h4>
</div><br> 

<div class="container">
  <form action="TambahUmumSingle.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Nama:</label>
      <input type="text" class="form-control" name="name" placeholder="masukan nama lengkap" required="">
    </div>
    <div class="form-group">
      <label for="email">alamat email :</label>
      <input type="email" class="form-control" name="email" placeholder="alamat email" required="">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" placeholder="masukan username" required="">
    </div>
    <div class="form-group">
      <label for="password">Sandi:</label>
      <input type="password" class="form-control" name="password" placeholder="masukan sandi" required="">
    </div>
    <div class="container">
  <form action="upload.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
  <label>DOKUMEN/CV</label>
   
      <label for="dokumen">Dokumen:</label>
      <input type="file"  name="file" placeholder="masukan dokumen" required="">
     
    </div>



    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
