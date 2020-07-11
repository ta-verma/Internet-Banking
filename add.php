<?php
	session_start();
	if($_SESSION['user']){
		$user=$_SESSION['user'];
	}
	else{
		header("location:index.php");
	}
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$amount=$_POST['amount'];
		$details=$_POST['details'];
		$conn=mysqli_connect("localhost", "root","") or die(mysqli_error());
		mysqli_select_db($conn,"atm") or die("Cannot connect to database");
		$query=mysqli_query($conn,"Select acc_num from users where username='$user'");
		$row = mysqli_fetch_array($query);
		$acc_num=$row['acc_num'];
		$result=mysqli_query($conn,"INSERT INTO `passbook` VALUES ('$acc_num','$details','$amount','$user',CURRENT_TIMESTAMP())");
		if($result)
		{
			Print '<script>alert("Successful Deposit Made.");window.location.assign("balance.php");</script>';
		}
		else {
			Print '<script>alert("Failed !!.");</script>';
			Print '<script>window.location.assign("home.php");</script>';
		}
	}
	else
	{
		header("location:home.php");
	}


 ?>
