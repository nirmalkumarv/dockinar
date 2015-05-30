<?php
// this line loads the library
require('libs/twilio/Twilio.php');

function sendSMSToUser($params){
$account_sid = 'ACdee20684f721ad0a1627592a7dddc442';
$auth_token = '04786c1993714f3bbe9f0e20358b4cac';
$client = new Services_Twilio($account_sid, $auth_token);

$phoneNo=$params["mobile_no"];
$response=$client->account->messages->create(array(
'To' => $phoneNo,
'From' => "+19099393232",
'Body' => "Testing",
'MediaUrl' => "https://pbs.twimg.com/profile_images/583942371429101568/jJBJtx1-_400x400.jpg",
));

return $response;

}

$param=array("mobile_no"=>"+919003125254","text"=>"New Webinars from Google");
$resp=sendSMSToUser($param);
//print_r($resp);
$responseText=serialize($resp);
$myfile = fopen("e:/sms-log".$param["mobile_no"].".txt", "w") or die("Unable to open file!");
fwrite($myfile, $responseText);
fclose($myfile);

echo "SMS Sent";
