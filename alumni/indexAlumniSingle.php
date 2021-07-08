<?php
  
  // Include database file
  include 'dataAlumni.php';

  $alumniObj = new Alumni();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $alumniObj->deleteRecord($deleteId);
  }
     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DATA Alumni</title>  <a button   href="../loginAlumni/index.php" type="submit" style="float:left;" class="btn btn-primary">Home </button> </a>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>DATA Alumni</h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Registrasi telah berhasil
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Data telah berhasil di update
            </div>";
    }
   
  ?>


  <h2>Info Data
   
  
  </h2>
  

  <table class="table table-hover">
    <thead>
       

      <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username</th>
        <th>Dokumen</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $alumni = $alumniObj->displayData(); 
          foreach ($alumni as $alumni) {
        ?>
        <tr>
          <td><?php echo $alumni['nim'] ?></td>
          <td><?php echo $alumni['name'] ?></td>
          <td><?php echo $alumni['email'] ?></td>
          <td><?php echo $alumni['username'] ?></td>
          <td><?php echo $alumni['dokumen'] ?></td>
          <td>
            <a href="editAlumni.php?editId=<?php echo $alumni['nim'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            
            </a>
            
          </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>