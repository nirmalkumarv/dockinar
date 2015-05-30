<?php
$pageName="about";
if($_GET["p"]) $pageName=$_GET["p"];
include("includes/header.php");
include("common/tools.php");


?>

  <?php

  include_once("pages/$pageName.php");
  ?>

</div>
<?php
include("includes/footer.php");
