<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task for WMF ltd.</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
	<main>

		<div id="mainContainer">

			<span class="pull-left glyphicon glyphicon-user dBlue fs36"></span>
			<span class="dBlue">WMF Login Form</span>

			<div class="btn-group pull-right" role="group">
			  <button id="logInButton" type="button" class="btn btn-default active">Log In</button>
			  <button id="signInButton" type="button" class="btn btn-default">Sign In</button>
			</div><br>
			<br><br>

			<form id="logInForm" enctype="multipart/form-data" class="form-horizontal" action="php/profile.php" method="post">
				<div class="form-group">
					<label id="l1" for="loginField" class="col-sm-2 control-label">Login*</label>
					<div class="col-sm-10">
						<input id="loginField" type="email" name="login" class="form-control required" placeholder="Enter e-mail" required>
					</div>
				</div>
				<div class="form-group">
					<label id="l2" for="passwordField" class="col-sm-2 control-label">Password*</label>
					<div class="col-sm-10">
						<input id="passwordField" type="password" name="password" class="form-control required" placeholder="Enter password" required>
					</div>
				</div>

				<div id="SignInTable" >
					<div class="form-group">
						<label id="l3" for="passwordField1" class="col-sm-2 control-label">Confirm*</label>
						<div class="col-sm-10">
							<input id="passwordField1" type="password" name="password1" class="form-control" placeholder="Confirm password">
						</div>
					</div>
					<div class="form-group">
						<label id="l4" for="newNameField" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input id="newNameField" type="text" name="newName" class="form-control" placeholder="Enter your Name">
						</div>
					</div>
					<div class="form-group">
						<label id="l5" for="ageField" class="col-sm-2 control-label">Age</label>
						<div class="col-sm-10">
							<input id="ageField" type="number" name="age" class="form-control" placeholder="Enter your age">
						</div>
					</div>
					<div class="form-group">
						<label id="l6" for="ageField" class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-10">
							<input id="phoneField" type="phone" name="phone" class="form-control" placeholder="Enter phone number (example: +380501234567)">
						</div>
					</div>
					<div class="form-group">
				    <label id="l7" class="col-sm-2 control-label" for="fileField">Avatar(2Mb)</label>
						<div class="col-sm-10">
							<input type="file" id="fileField" name="fileSrc" style="margin-top: 5px;">
						</div>
				  </div>
				</div>

				<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button id="goButton" type="submit" class="btn btn-success">Go On</button>
			    </div>
			  </div>

				<div id="l8" class="col-sm-10 pull-right">* - required field</div>
			</form>
			<a id="ru" href="#">RU/EN</a>
		</div>

	</main>
</body>
  <script src="js/script.js"></script>
</html>
