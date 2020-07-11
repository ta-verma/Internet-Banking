<html>
	<head>
	<title>Feedback Form</title>
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
		<h2 >Feedback form</h2>
		<a href="index.php" >Click Here to Go Back.</a><br/>
		<form action="feedback.php" method="POST">
			Username :      <input type="text" name="username" required="required"/><br/>
			Account Number : <input type="text" name="acc" required="required"/><br/>
      Feedback:  </br> </br><textarea rows="10" cols="50" name="comment" >Write here....</textarea></br>
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
    $comment = $_POST['comment'];
    $bool = true;

    $conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
    mysqli_select_db($conn, "atm") or die("Cannot connect to database");

    $query = mysqli_query($conn, "SELECT * FROM `users` ");
    //mysqli_query($conn,"INSERT INTO `feedback` VALUES ('$username','$acc','$comment'");
    while ($row = mysqli_fetch_array($query))
    {
        $table_user = $row['username'];
        $table_acc = $row['acc_num'];
        if ($username == $table_user)
        {
            if ($acc == $table_acc)
            {
                $bool = false;
                print '<script>alert("Submitted Successfully");</script>';
                mysqli_query($conn, "INSERT INTO `feedback` VALUES ('$username','$acc','$comment')");
                print '<script>window.location.assign("index.php");</script>';
            }
        }
    }
    if ($bool)
    {
        print '<script>alert("Failed!!! Incorrect Username or Account Number .");</script>';
        print '<script>window.location.assign("feedback.php");</script>';
    }
}
?>
