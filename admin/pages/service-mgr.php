<?php include_once("../modules/mod_organizer.php");?>
<?php include_once("../modules/mod_webinar.php");?>
<?php include_once("../services/fetch.php");?>
<?php include_once("../services/tweet.php");?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

  <h1 class="page-header">Service - Manager </h1>
<?php
  $orgId=$_REQUEST["oid"];
  $organizerInfo=getOrganizer($orgId);

  ?>
  <p>Fetching data for <?php echo $organizerInfo["name"];?>..</p>
  <?php
  echo $organizerInfo["webinar_series_url"];
  $url=$organizerInfo["webinar_series_url"];
  $orgcode=$organizerInfo["org_code"];

  $links=fetchWebinars($orgcode,$url);

  echo "<ul>";
  foreach($links as $i=>$link){
  echo "<li>".$link["title"]."</li>";
  $arrData["title"]=$link["title"];
  $arrData["webinar_url"]=$link["url"];
  $arrData["webinar_reg_url"]=$link["url"];
  $arrData["org_id"]=$orgId;

  saveWebinar($arrData);

  if(FETCH_SVC_TWEET){
    $arrData["is_tweeted"]=1;
    tweetToDockinar($arrData);
  }

  }  ?>
  </ul>;


</div>
