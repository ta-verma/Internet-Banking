<html>
	<head>
	<title>Kyc Form</title>
<style>
 .container{
	width: 450px;
	padding: 4% 4% 4%;
	margin : auto;
	box-shadow: 10px 10px 5px #888888;
	background-color: #fff;
	text-align: ;
	position:relative;
	top:50px;
	vertical-align: middle;
}

form{
	align-content: right;
	padding:10px;
	margin-top: 15px;
}
input
{
	margin :5px;
}

a{
	color:#f00f53;
	text-decoration: none;
	align-content: right;
}

.button{
	width :150px;
	margin :10px;
	padding:5px;
	font-weight: bold;
	background-color: #ff474a;
	text-align: center;
	position:relative;
	right:-100px;
	color:white;
}

.button:hover {
  background: #a30003;
}
body{
	background-color: PaleTurquoise;

    body
    {
    background-color : PaleTurquoise ;
    </style>
	</head>
	<?php
		session_start();
		if($_SESSION['user'])
		{}
		else
		{
			header("location:index.php");
		}
		$user=$_SESSION['user'];

		?>
	<body>
  <div class="container">
		<h2 >The Profile Page</h2>

		<a href="home.php" >Click Here to Go Back.</a><br/>
		<br/><br/>
		<?php
		$user=$_SESSION['user'];
		$conn =	mysqli_connect("localhost","root","") or die(mysqli_error());
			mysqli_select_db($conn,"ATM") or die("Cannot connect to database");

			$query=mysqli_query($conn,"SELECT * from `kyc` WHERE username='$user'");
			if(!$query)
				Print '<script>alert("Failed !!.");</script>';
			$row=mysqli_fetch_array($query);

    $acc=$row['acc_num'];
		$mob=$row['mobile'];
		$adhaar=$row['adhaar'];
		$pan=$row['pan'];


			Print "<h3>";
			Print "Username	:  " . $user;
			Print "<br>";
			Print "<br>";
			Print "Account number :  " . $acc;
			Print "<br>";
			Print "<br>";
			Print "Mobile No. :  " . $mob;
			Print "<br>";
			Print "<br>";
			Print " Adhaar :" . $adhaar;
			Print "<br>";
			Print "<br>";
			Print "PAN :  " . $pan;
			Print "<br>";
			Print "</h3>";

		 ?>
