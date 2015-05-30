<?php
ob_start();
session_start();
require_once("../common/db-config.php");
require_once("../common/db-utils.php");
require_once("../common/constants.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>:::: Dockinar :::: ADMINISTRATION Panel</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" title="no title" charset="utf-8">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<style>
body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="container">
