<?php
  
  // Include database file
  include 'DataUmum.php';

  $umumObj = new Umum();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $umumObj->deleteRecord($deleteId);
  }
     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DATA UMUM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>DATA UMUM</h4>
</div><br><br> 

<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              data telah berhasil terdaftar
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              data telah berhasil di update
            </div>";
    }
    
  ?>
  <h2>info data
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Dokumen</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $umum = $umumObj->displayData(); 
          foreach ($umum as $umum) {
        ?>
        <tr>
          <td><?php echo $umum['id'] ?></td>
          <td><?php echo $umum['name'] ?></td>
          <td><?php echo $umum['email'] ?></td>
          <td><?php echo $umum['username'] ?></td>
          <td><?php echo $umum['dokumen'] ?></td>
          <td>
            <a href="editUmum.php?editId=<?php echo $umum['id'] ?>" style="color:green">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
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