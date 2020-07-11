<html>
	<head>
	<title>Statement</title>
<style>
 .container{
	width: 600px;
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
	margin-top: 10px;
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
if ($_SESSION['user'])
{
}
else
{
    header("location:index.php");
}
$user = $_SESSION['user'];

?>
	<body>
  <div class="container">
		<h2 >Account statement</h2>

		<a href="home.php" >Click Here to Go Back.</a><br/>
		<br/><br/>
		<?php
$conn = mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "ATM") or die("Cannot connect to database");

$query = mysqli_query($conn, "SELECT * from `passbook` WHERE username='$user'");
if (!$query) print '<script>alert("Failed !!.");</script>';

print '<fieldset style="text-align:center;">
		<legend style="fontsize:48px;">Account Summary</legend>
		<div class="tic">
		<table border="2" cellpadding="10">
		<tr>
		<th>Account Number</th>
		<th>Details</th>
		<th>Amount</th>
		<th>Username</th>
		<th>Date-Time</th>
		</tr>
		<form  method="POST">';

while ($row = mysqli_fetch_array($query))
{

    print '<tr>';
    print '<th>';
    echo $row['acc_num'];
    print '</th>';
    print '<th>';
    echo $row['details'];
    print '</th>';
    print '<th>';
    echo $row['amount'];
    print '</th>';
    print '<th>';
    echo $row['username'];
    print '</th>';
    print '<th>';
    echo $row['date_transaction'];
    print '</th>
			</tr>';
}
print '</div></div></table>
		</form>
		</fieldset>';

?>
