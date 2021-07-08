<?php

	class umum
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

			$query="INSERT INTO umum(name,email,username,password,dokumen) VALUES('$name','$email','$username','$password','$dokumen')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexUmum.php?msg1=insert");
			}else{
			    echo "registrasi gagal mohon coba lagi";
			}
		}

		// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM umum";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "tidak ada data";
		    }
		}

		// Fetch single data for edit from customer table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM umum WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "tidak ada data";
		    }
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
		    $username = $this->con->real_escape_string($_POST['upname']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE umum SET name = '$name', email = '$email', username = '$username' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexUmum.php?msg2=update");
			}else{
			    echo "update data gagal, mohon coba lagi";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM umum WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:indexUmum.php?msg3=delete");
		}else{
			echo "data tidak terhapus mohon coba lagi";
		    }
		}

	}
?>