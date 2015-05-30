<?php
header("Access-Control-Allow-Origin: *");
?>
<?php
include("../common/db-config.php");
include("../common/db-utils.php");
include("../modules/mod_category.php");
/*
This is an example class script proceeding secured API
To use this class you should keep same as query string and function name
Ex: If the query string value rquest=delete_user Access modifiers doesn't matter but function should be
function delete_user(){
You code goes here
}
Class will execute the function dynamically;

usage :

$object->response(output_data, status_code);
$object->_request	- to get santinized input

output_data : JSON (I am using)
status_code : Send status message for headers

Add This extension for localhost checking :
Chrome Extension : Advanced REST client Application
URL : https://chrome.google.com/webstore/detail/hgmloofddffdnphfgcellkdfbfbjeloo

*/
define("DB_HOSTNAME",$host);
define("DB_USERNAME",$username);
define("DB_PASSWORD",$password);
define("DB_NAME",$db_name);


require_once("libs/Rest.inc.php");

class API extends REST {

  public $data = "";

  const DB_SERVER = DB_HOSTNAME;
  const DB_USER = DB_USERNAME;
  const DB_PASSWORD = DB_PASSWORD;
  const DB = DB_NAME;

  private $db = NULL;

  public function __construct(){
    parent::__construct();				// Init parent contructor
  //  $this->dbConnect();					// Initiate Database connection
  }

  /*
  *  Database connection
  */
  private function dbConnect(){
    $this->db = mysql_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
    if($this->db)
    mysql_select_db(self::DB,$this->db);
  }

  /*
  * Public method for access api.
  * This method dynmically call the method based on the query string
  *
  */
  public function processApi(){
    $func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));

    if((int)method_exists($this,$func) > 0)
    $this->$func();
    else
    $this->response('',404);				// If the method not exist with in this class, response would be "Page not found".
  }

  private function category(){

      $result=qry_data_api("select id,name from do_category where rec_status=1");
      $final_result=array("data"=>array('items'=>$result));
      // If success everythig is good send header as "OK" and return list of users in JSON format
      $this->response($this->json($final_result), 200);

  //  $this->response('',204);	// If no records "No Content" status

  }

  private function organizer()
  {
      $result=qry_data_api("select logo_name logo ,id from do_organizers where rec_status=1 AND logo_name!='img.jpg' ");
      $final_result=array("data"=>array('items'=>$result));
      // If success everythig is good send header as "OK" and return list of users in JSON format
      $this->response($this->json($final_result), 200);
  }

  private function webinar(){
    $result=[];
    $catIds=$_REQUEST["catId"];
    $mode=$_REQUEST["mode"];

    $where="Where W.rec_status=1";
    if($mode=="past") $where.=" and date(coalesce(W.webinar_date,now())) < date(now()) ";
    if($mode=="up") $where.=" and date(coalesce(W.webinar_date,now())) >= date(now()) ";
    if(isset($catIds)) $join=" JOIN do_webinar_category WC ON WC.webinar_id=W.id  and WC.category_id in (".$catIds.") ";

      $qry="select distinct O.id as org_id,O.website_url as org_url,O.name as org_name,W.webinar_time as wtime, W.webinar_date as wdate,W.id, W.title, W.description,O.logo_name logo, W.webinar_reg_url register_url,W.webinar_datetime date ,W.speaker_name speaker, W.webinar_url from do_webinars W";
      $qry.=" JOIN do_organizers O ON W.org_id = O.id $join $where";
      $qry.=" order by W.webinar_date desc, W.speaker_name desc";
    //echo $qry;
      //exit;

      // do_webinar_category WC on W.id=WC.webinar_id and WC.category_id in (".$catIds.") JOIN do_organizers O ON W.org_id = O.id JOIN do_category C ON WC.category_id = C.id where rec_status=1 ";

      $result=qry_data_api(  $qry);
      //echo   $qry;


    $final_result=array("data"=>array('items'=>$result));
    // If success everythig is good send header as "OK" and return list of users in JSON format
    $this->response($this->json($final_result), 200);

    //  $this->response('',204);	// If no records "No Content" status

  }

  /*
  *	Encode array into JSON
  */
  private function json($data){
    if(is_array($data)){
      return json_encode($data);
    }
  }
}

// Initiiate Library

$api = new API;
$api->processApi();
?>
