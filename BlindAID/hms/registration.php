<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($bd, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	header('location:user-login.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<style type="text/css">
			#result{
				height: 25px;
				width: 200px;
				border: 1px solid #ccc;
				padding: 10px;
				box-shadow: 0 0 10px 0 #bbb;
				margin-left: 40%;
				font-size: 14px;
				line-height: 25px;
			}
			button{
				font-size: 20px;
				position: absolute;
				float: left;
			}
			
			.top-nav{
	float:right;
}
.top-nav ul li{
	display:inline-block;
	float: left;
	border-left: 1px solid rgb(31, 132, 224);
}
.top-nav ul li:first-child{
	border-left:none;
}
.top-nav ul li a{
	font-family: 'Ropa Sans', sans-serif;
	background:#3391E7;
	color: #fff;
	text-transform: uppercase;
	padding: 30px;
	display: block;
}
.top-nav ul li a:hover{
	
}
.top-nav li.active> a, .top-nav li> a:hover {
	background: rgb(50, 133, 209);
	border-left-color:rgb(50, 133, 209);
}
		
		</style>
		
		

	</head>

	<body class="login">
		<div class="top-nav">
					<ul>
						<li class="active"><a href="http://localhost:8015/hospital">Home</a></li>

						<li><a href="contact.php">contact</a></li>
					</ul>
				</div>
		<div id="result">
					<button onclick="startConverting();"><i class="fa fa-microphone"></i></button>

		</div>

		
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<h2>Patient Registration</h2>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" id = "firstname" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="city" id="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="password_again" placeholder="Password Again" id="confirm" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
<script type="text/javascript">

			var r = document.getElementById('result');

			function startConverting () {
				if('webkitSpeechRecognition' in window){
					var speechRecognizer = new webkitSpeechRecognition();
					speechRecognizer.continuous = true;
					speechRecognizer.interimResults = true;
					speechRecognizer.lang = 'en-IN';
					speechRecognizer.start();

					var finalTranscripts = '';

					speechRecognizer.onresult = function(event){
						var interimTranscripts = '';
						
						for(var i = event.resultIndex; i < event.results.length; i++){
							var transcript = event.results[i][0].transcript;
							transcript.replace("\n", "<br>");
							if(event.results[i].isFinal){
								finalTranscripts += transcript;
								if (finalTranscripts.includes('home'))
								{
									window.location.replace("http://localhost/hospital/index.php");
								}
								if(finalTranscripts.includes('login'))
								{
									window.location.replace("http://localhost/hospital/hms/user-login.php");
								}
								if(finalTranscripts.includes('create') || finalTranscripts.includes('account'))
								{
									window.location.replace("http://localhost/hospital/hms/registration.php");
								}
								if(finalTranscripts.includes('name'))
								{
									var names = '';
									names = finalTranscripts;
									var res = names.split(" ");
									names = names.replace("name","");
									document.getElementById("firstname").value = names;
									finalTranscripts = "";
									interimTranscripts = "";
									
									

								}
								if(finalTranscripts.includes('address'))
								{
									var address = ''; 
									address = finalTranscripts;
									var resadd  = address.split(" ");
									address = address.replace("address","");
									document.getElementById("address").value = address;
									finalTranscripts = "";
									interimTranscripts = "";
									
									
									
								}
								if(finalTranscripts.includes('City') || finalTranscripts.includes('city'))
								{
									var city = '';
									city = finalTranscripts;
									var rescity  = city.split(" ");
									city = city.replace("City","");
									document.getElementById("city").value = city;
									finalTranscripts = "";
									interimTranscripts = "";
									
									
								}
								if (finalTranscripts.includes('male') || finalTranscripts.includes('Male')) 
								{
									

									
										document.getElementById('rg-male').checked = true;
										finalTranscripts = "";
									
									
								}
								if (finalTranscripts.includes('Female') || finalTranscripts.includes('female')) 
								{
										document.getElementById('rg-female').checked = true;
										finalTranscripts = "";
									
								}
								if (finalTranscripts.includes('Gmail') || finalTranscripts.includes('gmail'))
								{
									var email = finalTranscripts;
									email = email.replace("Gmail","");
									email = email.replace(/ /g,"");
									document.getElementById('email').value = email+"@gmail.com";
									finalTranscripts = "";
									
								}
								if(finalTranscripts.includes('Yahoo') || finalTranscripts.includes('yahoo'))
								{
									var email = finalTranscripts;
									email = email.replace("Yahoo","");
									email = email.replace(/ /g,"");
									document.getElementById('email').value = email+"@yahoo.com";
									finalTranscripts = "";
								}
								if(finalTranscripts.includes("password") || finalTranscripts.includes('Password'))
								{
									var pass = finalTranscripts;
									pass = pass.replace("password","");
									pass = pass.replace(/ /g,"");
									document.getElementById('password').value = pass;
									finalTranscripts = "";
								}
								if(finalTranscripts.includes('confirm') || finalTranscripts.includes('Confirm'))
								{
									var pass = finalTranscripts;
									pass = pass.replace("confirm","");
									pass = pass.replace(/ /g,"");
									document.getElementById('confirm').value = pass;
									finalTranscripts = "";
								}
								if(finalTranscripts.includes('agree') || finalTranscripts.includes('agree'))
								{
									
									
									document.getElementById('agree').checked = true;
									finalTranscripts = "";
								}
								if(finalTranscripts.includes('submit' || finalTranscripts.includes('submit')))
								{
									document.getElementById('submit').click();
								}
								
								
								
								
							}
							else{
								interimTranscripts += transcript;
							}
						}
						r.innerHTML = finalTranscripts + '<span style="color:red">' + interimTranscripts + '</span>';
					};
					speechRecognizer.onerror = function (event) {
					};
				}else{
					r.innerHTML = 'Your browser is not supported. If google chrome, please upgrade!';
				}
			}

			

		</script>
	</body>
	<!-- end: BODY -->
</html>