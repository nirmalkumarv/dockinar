<?php


$valid_passwords = array ("admin" => "dockadmin123");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated && $_SESSION["is_valid"]) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}




include("includes/header.php");
include("../common/tools.php");


?>
<link rel="stylesheet" href="assets/css/main.css" media="screen" title="no title" charset="utf-8">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">:::::: Dockinar  :::::: ADMINISTRATION Panel</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a >Welcome ! </a> </li>

        <li><a href="#"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Log out</a></li>


      </ul>

    </div>
  </div>
</nav>

<div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
    <div class="list-group">
      <a href="#" class="list-group-item active">
        Masters
      </a>
      <a href="?p=category-mgr" class="<?php echo ($p=="category-mgr")?"active":"" ?> list-group-item">Categories</a>

      <a href="?p=org-mgr" class="<?php echo ($p=="org-mgr")?"active":"" ?> list-group-item">Organizers</a>

      <a href="?p=webinar-mgr" class="<?php echo ($p=="webinar-mgr")?"active":"" ?> list-group-item">Webinars</a>

                <a href="?p=user-mgr" class="<?php echo ($p=="user-mgr")?"active":"" ?> list-group-item">Users</a>
      <a href="#" class="list-group-item active">
        Others
      </a>
      <a href="?p=service-mgr" class="<?php echo ($p=="service-mgr")?"active":"" ?> list-group-item">Service Mgr</a>

    </div>


  </div>

  <?php
    $pageName="webinar-mgr";
  $pmodes=array("List","Add","Edit","Delete");
  $pmode="List";
  if($_GET["p"]) $pageName=$_GET["p"];
  if($_GET["m"]=="0") $pmode=$pmodes[1];
  if($_GET["m"]=="2") $pmode=$pmodes[2];
  if($_GET["m"]=="3") $pmode=$pmodes[3];
  include_once("pages/$pageName.php");

  ?>

</div>
<?php
include("includes/footer.php");
