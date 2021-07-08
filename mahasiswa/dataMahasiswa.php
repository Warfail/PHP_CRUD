<?php

	class mahasiswa
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
			$nim = $this->con->real_escape_string($_POST['nim']);
			$name = $this->con->real_escape_string($_POST['name']);
			$email = $this->con->real_escape_string($_POST['email']);
			$username = $this->con->real_escape_string($_POST['username']);
			$password = $this->con->real_escape_string(md5($_POST['password']));

			$dokumen = rand(1000,10000)."-".$_FILES["file"]["name"];
		   
			#temporary file name to store file
			$tname = $_FILES["file"]["tmp_name"];
		   
			 #upload directory path
		$uploads_dir = 'uploads';
			#TO move the uploaded file to specific location
			move_uploaded_file($tname, $uploads_dir.'/'.$dokumen);

			$query="INSERT INTO mahasiswa(nim,name,email,username,password,dokumen) VALUES('$nim','$name','$email','$username','$password','$dokumen')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexMahasiswa.php?msg1=insert");
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM mahasiswa";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "DATA TIDAK DITEMUKAN";
		    }
		}

		// Fetch single data for edit from customer table
		public function displyaRecordById($nim)
		{
		    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "DATA TIDAK DITEMUKAN";
		    }
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
		    $username = $this->con->real_escape_string($_POST['upname']);
		    $nim = $this->con->real_escape_string($_POST['nim']);
		if (!empty($nim) && !empty($postData)) {
			$query = "UPDATE mahasiswa SET name = '$name', email = '$email', username = '$username' WHERE nim = '$nim'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexMahasiswa.php?msg2=update");
			}else{
			    echo "gagal mengupdate data, mohon coba lagi";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($nim)
		{
		    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:indexMahasiswa.php?msg3=delete");
		}else{
			echo "data tidak terhapus, mohon coba lagi";
		    }
		}

	}
?>