<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css" />
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
	</head>
	<body>
		<div id="result">
					<button onclick="startConverting();"><i class="fa fa-microphone"></i></button>

		</div>

		<script type="text/javascript">

			var r = document.getElementById('result');

			function startConverting () {
				var msg = new SpeechSynthesisUtterance('Say Book an appointment to open appointment page');
				window.speechSynthesis.speak(msg);
				var msg = new SpeechSynthesisUtterance('Say appointment history to open history page');
				window.speechSynthesis.speak(msg);
				var msg = new SpeechSynthesisUtterance('Say logout to logout');
				window.speechSynthesis.speak(msg);
				var msg = new SpeechSynthesisUtterance('Say change password to change your password');
				window.speechSynthesis.speak(msg);
				var msg = new SpeechSynthesisUtterance('Say profile to open your profile page');
				window.speechSynthesis.speak(msg);
				
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
									window.location.replace("http://localhost:8018/BlindAid2/index.php");
									
								}
								if(finalTranscripts.includes('login'))
								{
									window.location.replace("http://localhost:8015/blindaid2/hms/user-login.php");

								}
								if(finalTranscripts.includes('create') || finalTranscripts.includes('account'))
								{
									window.location.replace("http://localhost:8015/blindaid2/hms/registration.php");
								}
								if (finalTranscripts.includes('book'))
								{
									window.location.replace("http://localhost:8015/blindaid2/hms/book-appointment.php");
								}
								if(finalTranscripts.includes('profile'))
								{
									window.location.replace("http://localhost/hospital/hms/edit-profile.php");
								}
								if(finalTranscripts.includes('appointment'))
								{
									window.location.replace("http://localhost/hospital/hms/appointment-history.php");
								}
								if(finalTranscripts.includes('dashboard'))
								{
									window.location.replace("http://localhost:8015/blindaid2/hms/dashboard.php");

								}
								if(finalTranscripts.includes('logout'))
								{
									window.location.replace("http://localhost:8015/blindaid2/hms/user-login.php")
								}
								
								if(finalTranscripts.includes('username') || finalTranscripts.includes('Username'))
								{
									var email = finalTranscripts;
									email = email.replace("username","");
									email = email.replace(/ /g,"");
									document.getElementById('username').value = email+"@gmail.com";
									finalTranscripts = "";
								}
								
								if(finalTranscripts.includes('password') || finalTranscripts.includes('Password'))
								{
									var email = finalTranscripts;
									email = email.replace("password","");
									email = email.replace(/ /g,"");
									document.getElementById('password').value = email;
									finalTranscripts = "";
								}
								if (finalTranscripts.includes('submit') || finalTranscripts.includes('Submit')) {
									document.getElementById('enter').click();
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
	</body>
</html>