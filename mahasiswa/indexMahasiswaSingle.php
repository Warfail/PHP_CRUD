<?php
  
  // Include database file
  include 'dataMahasiswa.php';

  $mahasiswaObj = new Mahasiswa();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $mahasiswaObj->deleteRecord($deleteId);
  }
     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DATA Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>DATA Mahasiswa</h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              data telah tersimpan
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              data telah berhasil di update
            </div>";
    }
    
  ?>
  <h2>Data Tersedia
  
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nim</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Dokumen</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $mahasiswa = $mahasiswaObj->displayData(); 
          foreach ($mahasiswa as $mahasiswa) {
        ?>
        <tr>
          <td><?php echo $mahasiswa['nim'] ?></td>
          <td><?php echo $mahasiswa['name'] ?></td>
          <td><?php echo $mahasiswa['email'] ?></td>
          <td><?php echo $mahasiswa['username'] ?></td>
          <td><?php echo $mahasiswa['dokumen'] ?></td>
          <td>
            <a href="editMahasiswa.php?editId=<?php echo $mahasiswa['nim'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            
            </a>
          </td>
        </tr>
        
        <a button   href="../loginMahasiswa/index.php" type="submit" style="float:left;" class="btn btn-primary">Home </button> </a>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>