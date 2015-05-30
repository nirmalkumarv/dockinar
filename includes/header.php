<?php
ob_start();
session_start();
require_once("common/db-config.php");
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Hub for Webinars">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Dockinar - Hub for Webinars</title>


    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="jumbotron.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/handlebar.js"></script>

  </head>

  <body>
<style>
body {
  padding-top: 90px;
  padding-bottom: 20px;
  background-image: url(assets/img/egg_shell.jpg);
}

</style>
    <nav class="navbar navbar-inverse navbar-fixed-top grew-color" style="height:75px;">
      <div class="container">
		<div class="navbar-header">
			<img src="assets/img/dockinar.png" style="height:60px;margin-top:5px;"/>
		</div>
        <div class="navbar-header">

		    <a class="navbar-brand" href="#">Dockinar</a>
		</div>
		<div class="not-index not-index col-md-offset-2" style="padding-top:25px;">
		  <ul class="nav navbar-nav">
			<li class='<?php echo $pageName=="main"?"active":"";?>'><a href="/?p=main">Home</a></li>
			<li class='<?php echo $pageName=="organizer"?"active":"";?>'><a href="/organizer">Organizer</a></li>
			<li class='<?php echo $pageName=="developer"?"active":"";?>'><a href="/developer" >Developers</a></li>

			<li class='<?php echo $pageName=="about"?"active":"";?>'><a href="/about" >About</a></li>
		  </ul>
		</div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="?p=login" type="submit" class="btn btn-success">Sign in</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
