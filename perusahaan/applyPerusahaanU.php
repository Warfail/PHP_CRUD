<?php
  
  // Include database file
  include 'dataPerusahaan.php';

  $perusahaanObj = new Perusahaan();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $perusahaanObj->deleteRecord($deleteId);
  }
     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Perusahaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Data Perusahaan</h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
  <h2>Info Perusahaan
  
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Kode</th>
        <th>Bidang</th>
        <th>Nama</th>
        <th>Lowongan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $perusahaan = $perusahaanObj->displayData(); 
          foreach ($perusahaan as $perusahaan) {
        ?>
        <tr>
          <td><?php echo $perusahaan['kode'] ?></td>
          <td><?php echo $perusahaan['nama'] ?></td>
          <td><?php echo $perusahaan['bidang'] ?></td>
          <td><?php echo $perusahaan['lowongan'] ?></td>
          <td button href="" type="submit" class="btn btn-primary">Mendaftar</button></td>
          
          <td>
           
            </a>
          </td>
        </tr>
        
        <a button   href="../loginUmum/index.php" type="submit" style="float:left;" class="btn btn-primary">Home </button> </a>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>