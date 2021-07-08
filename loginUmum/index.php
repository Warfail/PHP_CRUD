<!DOCTYPE html>
<html lang="en">


<head>
    <div class="container">
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



  <style>
        /* Modify the background color */

        h1 {
    text-align:center;
    margin: 10px auto;
    
    color: rgb(14, 125, 145);
    
}
          
        .navbar-custom {
            background-color: lightblue;
        }
        /* Modify brand and text color */
          
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: green;
        }
    </style>




</head>

<div class="jumbotron text-center">
  <h1>Bursa Kerja UKSW</h1>

<bodyclass="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					


<?php





session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<div class="container">
    <?php
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'user.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
    ?>


     <nav class="navbar navbar-custom">
     
     

    <div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      
   Dashboard Umum
  </button >
  <div class="dropdown-menu" >

    <a class="dropdown-item" href="../UMUM/indexUmumSingle.php">Umum</a>
    <a class="dropdown-item" href="../UMUM/TambahUmumSingle.php">Registrasi</a>
    <a class="dropdown-item" href="../perusahaan/applyPerusahaanU.php">Info Perusahaan</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">More info</a>
  </div>
</div>

<a button   href="userAccount.php?logoutSubmit=1" type="submit" style="float:right;" class="btn btn-primary">Logout </button> </a>
     </nav>



    <h2>Selamat datang <?php echo $userData['first_name']; ?>!</h2>
   
   
    <div class="form-group">
        <p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
        <p><b>Email: </b><?php echo $userData['email']; ?></p>
        <p><b>Phone: </b><?php echo $userData['phone']; ?></p>
    </div>
   
   <ul class="breadcrumb">
    <li class="breadcrumb-item"> <a href="#"> About Us </a></li>
</ul>
</div>


    <?php }else{ ?>
        <div class="brand">
                    <img src="logouksw.png" width="400" height="400">
                    </div>
        <div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">MASUK SEBAGAI UMUM</h4>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="form-group">
        <form action="userAccount.php" method="post">
        <label for="email">EMAIL :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required="">
        </div>        
        <div class="form-group">    
        <label for="pwd">Sandi :</label>
            <input type="password" class="form-control" id="pwd" name="password" placeholder="Sandi" required="">
        </div>
            
            
                <button type="submit" class="btn btn-primary btn-block" name="loginSubmit">Login </button>
            
        </form>
        <div class="margin-top20 text-center">
        <p>belum punya akun? <a href="registration.php">mendaftar</a></p>
        <p>salah kategori? <a href="../index.html">ganti pengguna</a></p>
        <div id="footer text-center">
    Copyright &copy; tugas rancang RPL-H
  </div>
    <?php } ?>




   
</body>

</html>




