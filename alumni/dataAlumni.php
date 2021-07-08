<?php

	class alumni
	{
		private $servername = "localhost";//namaserver
		private $username   = "root";//nama user
		private $password   = "";//sandi database
		private $database   = "blog_database";//nama database
		public  $con;//variabel koneksi


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

	
		public function insertData($post)
		{
			$nim = $this->con->real_escape_string($_POST['nim']);
			$name = $this->con->real_escape_string($_POST['name']);
			$email = $this->con->real_escape_string($_POST['email']);
			$username = $this->con->real_escape_string($_POST['username']);
			$password = $this->con->real_escape_string(md5($_POST['password']));
			

			 $dokumen = rand(1000,10000)."-".$_FILES["file"]["name"];
		   
			
			  $tname = $_FILES["file"]["tmp_name"];
			 
			
		  $uploads_dir = 'uploads';
			 
			  move_uploaded_file($tname, $uploads_dir.'/'.$dokumen);
		   
			$query="INSERT INTO alumni(nim,name,email,username,password,dokumen) VALUES('$nim','$name','$email','$username','$password','$dokumen')";
			
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexAlumni.php?msg1=insert");
			}else{
			    echo "Registrasi gagal coba lagi!";
			}
			
		}

		
		public function displayData()
		{
		    $query = "SELECT * FROM alumni";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "tidak ada data ditemukan";
		    }
		}

	
		public function displyaRecordById($nim)
		{
		    $query = "SELECT * FROM alumni WHERE nim = '$nim'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "tidak ada data ditemukan";
		    }
		}

		
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
		    $username = $this->con->real_escape_string($_POST['upname']);
		    $nim = $this->con->real_escape_string($_POST['nim']);
		if (!empty($nim) && !empty($postData)) {
			$query = "UPDATE alumni SET name = '$name', email = '$email', username = '$username' WHERE nim = '$nim'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexAlumni.php?msg2=update");
			}else{
			    echo "Update data gagal silahkan coba lagi!";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($nim)
		{
		    $query = "DELETE FROM alumni WHERE nim = '$nim'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:indexAlumni.php?msg3=delete");
		}else{
			echo "Data tidak terhapus";
		    }
		}

	}
?>