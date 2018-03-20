<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" media="screen and (min-width: 901px)" href="css/widescreen/widescreen_form.css">
<link rel="stylesheet" media="screen and (min-width: 701px) and (max-width: 900px)" href="css/middlescreen/middlescreen_form.css">
<link rel="stylesheet" media="screen and (min-width: 501px) and (max-width: 701px)" href="css/middlelessscreen/middlelessscreen_form.css">
<link rel="stylesheet" media="screen and (max-width: 500px)" href="css/smallscreen/smallscreen_form.css">
 
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>
<body>
  <div class="header">
  	<h2>Registration Form</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" id="username">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" id="password">
      </div>
      <div id="error"></div>
  	<div class="input-group">
  	  <button type="submit" class="btn" id="registr">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
 
</body>
<script src="js/scripts.js"></script>
</html>