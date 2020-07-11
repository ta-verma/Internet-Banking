<html>
	<head>
	<title>Welcome to E-Banking</title>
<style>
 .container{
	width: 450px;
	padding: 4% 4% 4%;
	margin : auto;
	box-shadow: 10px 10px 5px #888888;
	background-color: #fff;
	text-align: center;
	position:relative;
	top:50px;
	vertical-align: middle;
}

form{
	align-content: center;
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
}
    body
    {
    background-color : PaleTurquoise ;
    </style>
	</head>
	<body>

	<div class="container">
		<h2 >The Registraion Page</h2>
		<a href="index.php" >Click Here to Go Back.</a><br/>
		<form action="register.php" method="POST">
			Enter Account Number :	<input type="text" name="acc_num" required="required"/><br/>
			Enter Username : <input type="text" name="username" required="required"/><br/>
			Enter Password : <input type="password" name="password" required="required"/><br/>
			Enter Branch Name :	 <input type="text" name="brname" required="required"/><br/>
			<input type="submit" value="Register" class="button"/>
			</form>
	</div>
	</body>

</html>

<?php
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$brname = $_POST['brname'];
		$acc_num=$_POST['acc_num'];
		$bool=true;

		$conn=mysqli_connect("localhost","root","") or die(mysqli_error());
		mysqli_select_db($conn,"atm") or die("Cannot connect to database");
		$query=mysqli_query($conn,"SELECT * FROM `users` ");
		while($row=mysqli_fetch_array($query))
		{
			$table_user=$row['username'];
			if($username==$table_user)
			{
				$bool=false;
				Print '<script>alert("Username has already been taken!");</script>';
				Print '<script>window.location.assign("register.php");</script>';
			}
		}
		if($bool)
		{
			if(is_numeric($acc_num) && preg_match ("/^[a-zA-Z\s]+$/",$brname) && preg_match('/^\w+$/',$username))
			{
				$r=mysqli_query($conn,"INSERT INTO `users` VALUES ('$username','$password',CURRENT_TIMESTAMP(),'$brname','$acc_num')");
				if($r)
				{
					Print '<script>alert("Successfully Registered! ");</script>';
					Print '<script>window.location.assign("index.php");</script>';
				}
				else
				Print '<script>alert("Failed! ");</script>';

			}
			else
			{
				if(!preg_match('/^\w+$/',$username))
				Print '<script>alert("Failed ! Username contains only alphabets and underscore ");</script>';
				if(!is_numeric($acc_num))
				Print '<script>alert("Failed ! Incorrect Account Number ");</script>';
				if ( !preg_match ("/^[a-zA-Z\s]+$/",$brname))
				Print '<script>alert("Failed ! Incorrect Branch Name ");</script>';
				Print '<script>window.location.assign("register.php");</script>';
		}
	}
}
?>
