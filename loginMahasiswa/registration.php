<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<div class="jumbotron text-center">
  <h1>Bursa Kerja UKSW</h1>
  
</div>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
                    <img src="logouksw.png" width="400" height="400">
					</div>

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
<div class="card fat">
		<div class="card-body">

    <h2 class="card-title text-center">buat akun baru</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">

        <div class="form-group">
        <label for="name">nama depan :</label>
            <input type="text" class="form-control" name="first_name" placeholder="nama depan" required="">
        </div>
        <div class="form-group">
        <label for="name">nama belakang :</label>
            <input type="text" class="form-control" name="last_name" placeholder="LAST NAME" required="">
        </div>
        <div class="form-group">
        <label for="email">Email student:</label>
            <input type="email" class="form-control" name="email" placeholder="Email student" required="">
        </div>
            <div class="form-group">
            <label for="email">nomor telepon :</label>
            <input type="text" class="form-control" name="phone" placeholder="nomor telepon" required="">
            </div>
            <div class="form-group">
            <label for="password">sandi :</label>
            <input type="password" class="form-control" name="password" placeholder="sandi" required="">
            </div>
            <div class="form-group">
            <label for="password">konfirmasi sandi:</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="konfirmasi sandi" required="">
            </div>
            
            <div class="form-group">
									<label>
										<input type="checkbox" name="aggree" value="1"> saya setuju dengan syarat dan ketentuan dari uksw
									</label>
								</div>

            <div class="send-button">
                <input type="submit" name="signupSubmit" class="btn btn-primary" style="float:right;" value="BUAT AKUN">
            </div>
        </form>
    </div>
</div>
<div id="footer">
    Copyright &copy; tugas rancang RPL-H
  </div>
</body>

</html>