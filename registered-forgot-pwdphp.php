<?php
		$conn = new mysqli("localhost","root","", "sample1");
		if($conn->connect_error)
		{
			die("Connection failed: ".$conn->connect_error);
		}
		$email = $_POST["email"];
		$mob = $_POST["mob"];
		$sql = "SELECT * FROM register";
		$k = 0;
		if ($result=mysqli_query($conn,$sql))
		{
			while ($row=mysqli_fetch_row($result))
		   	{
		   		if($email==$row[6] && $mob==$row[5])
		   		{
		   			$sql1 = "INSERT INTO temp(pwd) VALUES('$row[1]')";
		   			mysqli_query($conn, $sql1);
					header("Location: user_found.php");
					$k = 1;
		   		}
		   	}
			mysqli_free_result($result);
		}
		if($k==0)
		{
			header("Location: user_not_found.php");
		}
	?>