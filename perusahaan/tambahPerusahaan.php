<?php

  // Include database file
  include 'dataPerusahaan.php';

  $perusahaanObj = new perusahaan();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $perusahaanObj->insertData($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registrasi Data Perusahaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Registrasi Data Perusahaan</h4>
</div><br> 

<div class="container">
  <form action="tambahPerusahaan.php" method="POST">
  <div class="form-group">
      <label for="kode">Kode:</label>
      <input type="text" class="form-control" name="kode" placeholder="Kode perusahaan" required="">
    </div>
    <div class="form-group">
      <label for="bidang">Name:</label>
      <input type="text" class="form-control" name="bidang" placeholder="nama perusahaan" required="">
    </div>
    <div class="form-group">
      <label for="bidang">bidang</label>
      <input type="text" class="form-control" name="nama" placeholder="bidang perusahaan" required="">
    </div>
    <div class="form-group">
      <label for="lowongan">status lowongan:</label>
      <input type="text" class="form-control" name="lowongan" placeholder="status lowongan" required="">
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>