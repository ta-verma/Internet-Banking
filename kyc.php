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
	<body>

	<div class="container">
		<h2 >Kyc form</h2>
		<a href="home.php" >Click Here to Go Back.</a><br/>
		<form action="kyc.php" method="POST">
			Username :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="username" required="required"/><br/>
			Account Number : <input type="number" name="acc" required="required"/><br/>
			Mobile number :&nbsp&nbsp&nbsp <input type="number" name="mob" required="required"/><br/>
			Adhar number : &nbsp&nbsp&nbsp&nbsp<input type="number" name="adhar" required="required"/><br/>
			pan :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="number" name="pan" required="required"/><br/>
      <input type="submit" value="submit" class="button"/>
			</form>
	</div>
	</body>

</html>

<?php
if (isset($_POST['username']))
{
    $username = $_POST['username'];
    $acc = $_POST['acc'];
    $mob = $_POST['mob'];
    $adhar = $_POST['adhar'];
    $pan = $_POST['pan'];
    $bool = true;
    $flag = true;

    $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
    mysqli_select_db($conn, "atm") or die("Cannot connect to database");

    $query = mysqli_query($conn, "SELECT * FROM `users` ");
    $query_k = mysqli_query($conn, "SELECT * FROM `kyc` ");

    while ($row_k = mysqli_fetch_array($query_k))
    {
        $table_adhaar = $row_k['adhaar'];
        $table_pan = $row_k['pan'];
        $table_mob = $row_k['mobile'];
        $table_acc_k = $row_k['acc_num'];
        if ($table_acc_k == $acc) $flag = false;

        if ($flag)
        {
            while ($row = mysqli_fetch_array($query))
            {
                $table_user = $row['username'];
                $table_acc = $row['acc_num'];
                if ($username == $table_user)
                {
                    if ($acc == $table_acc)
                    {
                        $bool = false;
                        print '<script>alert("Updated Successfully");</script>';
                        mysqli_query($conn, "INSERT INTO `kyc` VALUES ('$username','$acc','$mob','$adhar','$pan')");
                    }
                }
            }
            if ($bool)
            {
                print '<script>alert("Failed!!!");</script>';
                print '<script>window.location.assign("kyc.php");</script>';
            }
        }
        else
        {
            while ($row = mysqli_fetch_array($query))
            {
                $table_user = $row['username'];
                $table_acc = $row['acc_num'];
                if ($username == $table_user)
                {
                    if ($acc == $table_acc)
                    {
                        $bool = false;
                        print '<script>alert("Updated Successfully");</script>';
                        mysqli_query($conn, "UPDATE `kyc` set mobile='$mob' , pan='$pan', adhaar='$adhar' where acc_num='$acc'");
                    }
                }
            }
            if ($bool)
            {
                print '<script>alert("Failed!!!");</script>';
                print '<script>window.location.assign("kyc.php");</script>';
            }
        }
    }

}
?>
