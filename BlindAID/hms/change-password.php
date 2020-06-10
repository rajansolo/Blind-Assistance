<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$sql=mysqli_query($bd,"SELECT password FROM  users where password='".md5($_POST['cpass'])."' && email='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($bd,"update users set password='".md5($_POST['npass'])."', updationDate='$currentTime' where email='".$_SESSION['login']."'");
$_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User  | change Password</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
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
		</style>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.npass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npass.focus();
return false;
}
else if(document.chngpwd.cfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cfpass.focus();
return false;
}
else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cfpass.focus();
return false;
}
return true;
}
</script>

	</head>
	<body>
		
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User | Change Password</h1>
																	</div>
																	<div id="result">
					<button onclick="startConverting();"><i class="fa fa-microphone"></i></button>

		</div>
								<ol class="breadcrumb">
									<li>
										<span>User</span>
									</li>
									<li class="active">
										<span>Change Password</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Change Password</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="exampleInputEmail1">
																Current Password
															</label>
							<input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password" id="current">
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																New Password
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="New Password" id="new">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword1">
																Confirm Password
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" id="confirm">
														</div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary" id="submit">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
								</div>
							</div>
						
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			<>
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
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
								if (finalTranscripts.includes('book'))
								{
									window.location.replace("http://localhost/hospital/hms/book-appointment.php");
								}
								if(finalTranscripts.includes('profile'))
								{
									window.location.replace("http://localhost/hospital/hms/edit-profile.php");
								}
								if(finalTranscripts.includes('appointment'))
								{
									window.location.replace("http://localhost/hospital/hms/appointment-history.php");
								}
								if(finalTranscripts.includes('home'))
								{
									window.location.replace("http://localhost/hospital/hms/dashboard.php");

								}
								if (finalTranscripts.includes('logout')) {
									window.location.replace("http://localhost/hospital/hms/logout.php")
								}
								if(finalTranscripts.includes("current password"))
								{
									var pass = finalTranscripts;
									pass = pass.replace("current password","");
									pass = pass.replace(/ /g,"");

									document.getElementById("current").value =  pass;
									finalTranscripts = "";
								}
								if(finalTranscripts.includes("new password"))
								{
									var pass = finalTranscripts;
									pass = pass.replace("new password","");
									pass = pass.replace(/ /g,"");
									document.getElementById("new").value =  pass;
									finalTranscripts = "";
								}
								if(finalTranscripts.includes("confirm password"))
								{
									var pass = finalTranscripts;
									pass = pass.replace("confirm password","");
									pass = pass.replace(/ /g,"");

									document.getElementById("confirm").value =  pass;
									finalTranscripts = "";
								}
								if(finalTranscripts.includes('submit'))
								{
									document.getElementById('submit').click();
								}
								
							}
							else{
								interimTranscripts += transcript;
							}
						}
						r.innerHTML = finalTranscripts + '<span style="color:#999">' + interimTranscripts + '</span>';
					};
					speechRecognizer.onerror = function (event) {
					};
				}else{
					r.innerHTML = 'Your browser is not supported. If google chrome, please upgrade!';
				}
			}

			

		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
