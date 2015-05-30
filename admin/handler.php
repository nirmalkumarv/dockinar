<?
session_start();
require_once("../common/db-config.php");
require_once("../common/db-utils.php");
require_once("../common/tools.php");
require_once("../common/constants.php");
require_once("../services/tweet.php");
require_once("../modules/mod_webinar.php");

$result=getWebinar($_GET["webinar_id"]);

$params["title"]=$result["title"];
$params["url"]=$result["webinar_url"];
$params["speaker"]=$result["speaker_name"];
$params["org_name"]=$result["org_name"];
$updateParams["is_tweeted"]=1;
$updateParams["wid"]=$result["id"];
//print_r($result) ;
tweetToDockinar($params);
saveWebinar($updateParams);


?>
