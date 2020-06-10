
<?php $mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "hms";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");
if($_GET['action']=='doctorid'){
	$docinfo=$_POST['docinfo'];
	$query= mysqli_query($bd,"select * from doctors where doctorName=$docinfo");
	$array=mysqli_fetch_array($query);
	echo $array['docFees'];
	
	}
	?>