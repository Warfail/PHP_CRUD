<?php

	class perusahaan
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "blog_database";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}

		// Insert customer data into customer table
		public function insertData($post)
		{
			$id_perusahaan = $this->con->real_escape_string($_POST['id_perusahaan']);
			$kode = $this->con->real_escape_string($_POST['kode']);
			//$nim_alumnni = $this->con->real_escape_string($_POST['nim_alumni']);
			$nim_mahasiswa = $this->con->real_escape_string($_POST['nim_mahasiswa']);
            $id = $this->con->real_escape_string($_POST['id']);
			
			$query="INSERT INTO info_pendaftar(id_perusahaan,kode,nim_alumni,nim_mahasiswa,id) VALUES('$id_perusahaan','$kode','$nim_alumni','$nim_mahasiswa',$'id')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:infoPerusahaan.php?msg1=insert");
			}else{
			    echo "Registrasi gagal mohon coba lagi";
			}
		}

public function displayData()
		{
		    $query = "SELECT * FROM info_perusahaan";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "tidak ada data perusahaan";
		    }
		}
    }
    ?>

<div class="container">
  <form action="tambahPerusahaan.php" method="POST">
  </form>
</div>