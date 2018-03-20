<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Sergii Liuk Test</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/note.css" />

  <link rel="stylesheet" media="screen and (min-width: 901px)" href="css/widescreen/widescreen.css">
  <link rel="stylesheet" media="screen and (min-width: 701px) and (max-width: 900px)" href="css/middlescreen/middlescreen.css">
  <link rel="stylesheet" media="screen and (min-width: 501px) and (max-width: 701px)" href="css/middlelessscreen/middlelessscreen.css">
  <link rel="stylesheet" media="screen and (max-width: 500px)" href="css/smallscreen/smallscreen.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
</head>

<body onload="displayData()">

  <div class="header">
    <ul class="text-animation hidden">
      <li>H</li>
      <li>E</li>
      <li>L</li>
      <li>L</li>
      <li>O</li>
    </ul>
  </div>
  <script>
    $(function () {
      setTimeout(function () {
        $('.text-animation').removeClass('hidden');
      }, 500);
    });
  </script>
  <!-- logged in user information -->
  <div class="nav-bar">
    <a id="logged">
      <?php  if (isset($_SESSION['username'])) : ?> Welcome
      <?php echo $_SESSION['username']; ?>
    </a>
    <a href="index.php?logout='1'">Log Out</a>
    <?php endif ?>
  </div>

  <div id="content">

    <div class="leftcolumn">
      <div class="card">
        <form method="post" action="index.php">
          <div class="input-group">
            <input type="text" id="note" placeholder="your note">
          </div>
          <div class="input-group">
            <button type="submit" class="btn addnote" id="addnote">Add Note</button>
          </div>
        </form>
        <br>
        <hr>
        <div class="funny-holder">
          <div class="funny text">
            <p>Are you satisfied with my work?</p>
            <div class="funny-btn-group">
            <button class="funny btn" id="yes">Yes</button>
            <button class="funny btn" id="no">No</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="rightcolumn">

      <div class="card">
        <h2>List of Notes</h2>
        <hr>
        <table id="notes_holder"></table>
      </div>
    </div>

  </div>

  <footer>
    <h2>Sergii Liuk Test</h2>
  </footer>

</body>

<script src="js/scripts.js"></script>

</html>