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
			$kode = $this->con->real_escape_string($_POST['kode']);
			$bidang = $this->con->real_escape_string($_POST['bidang']);
			$nama = $this->con->real_escape_string($_POST['nama']);
			$lowongan = $this->con->real_escape_string($_POST['lowongan']);
			
			$query="INSERT INTO perusahaan(kode,bidang,nama,lowongan) VALUES('$kode','$bidang','$nama','$lowongan')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexPerusahaan.php?msg1=insert");
			}else{
			    echo "Registrasi gagal mohon coba lagi";
			}
		}

		// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM perusahaan";
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

		// Fetch single data for edit from customer table
		public function displyaRecordById($kode)
		{
		    $query = "SELECT * FROM perusahaan WHERE kode = '$kode'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "tidak ada data perusahaan";
		    }
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
		    $nama = $this->con->real_escape_string($_POST['uname']);
		    $bidang = $this->con->real_escape_string($_POST['updname']);
		    $lowongan = $this->con->real_escape_string($_POST['upname']);
		    $kode = $this->con->real_escape_string($_POST['kode']);
		if (!empty($kode) && !empty($postData)) {
			$query = "UPDATE perusahaan SET  bidang = '$bidang',  nama = '$nama', lowongan = '$lowongan' WHERE kode = '$kode'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexPerusahaan.php?msg2=update");
			}else{
			    echo "gagal mengupdate data perusahaan";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($kode)
		{
		    $query = "DELETE FROM perusahaan WHERE kode = '$kode'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:indexPerusahaan.php?msg3=delete");
		}else{
			echo "data perusahaan tidak terhapus mohon coba lagi";
		    }
		}

	}
?>