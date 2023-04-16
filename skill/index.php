<?php
	//user login
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="ie-edge,chrome=1.0,safari">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/w3.css">
	</head>
	<body>
		<div class="w3-blue w3-padding-large w3-card-2">
			<h3>STUDENT</h3>
		</div>
		<div class="w3-padding-large">
			
			<div class="w3-panel w3-round-xlarge w3-card-4 w3-animate-top">
				
				<form action="login.php" method="post">
					<p>
						<label><b>USERNAME</b></label>
						<input type="text" id="username" name="username" class="w3-input w3-border">
					</p>
					<p>
						<label><b>PASSWORD</b></label>
						<input type="password" id="password" name="password" class="w3-input w3-border">
					</p>
					<p class="w3-center">
						<?php
							if(isset($_GET['message'])){
								echo $_GET['message'];
							}
						?>
					</p>
					<p>
						<input type="submit" value="LOGIN" class="w3-button w3-blue w3-right">
						<br><br>
					</p>
				</form>
			</div>
		</div>
	</body>
</html>