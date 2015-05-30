<?php
//GetWebinars
//RemoveWebinars
//Add Webinars

function saveWebinar($params=null){


  $inputData=$_POST;
  if(isset($params)) $inputData=$params;
  $curTime=getIndianDateTime();
  $webinar_id=$inputData["wid"];
  $mode=$_GET["m"];


  foreach($inputData as $key => $value) { $arr_data[$key]=$value;}
  foreach($arr_data as $key => $value) {
    if(!is_array($value))
      $arr_data[$key]=addslashes($value);
    }


  $webinar_categories=$_POST["category"];

  $arr_data["rec_status"]=1;
  $arr_data["created_date"]=$curTime;



  if($webinar_id>0){
    $arr_data["modified_date"]=$curTime;
    update_qry("do_webinars",$arr_data,"id=".$webinar_id);
  }
  else{
    $webinar_id=insert_qry("do_webinars",$arr_data);
  }

  qry_data("delete from do_webinar_category where webinar_id=".$webinar_id);
  if(is_array($webinar_categories)){
  foreach($webinar_categories as $catId){
    $arr_data["category_id"]=$catId;
    $arr_data["webinar_id"]=$webinar_id;
    insert_qry("do_webinar_category",$arr_data);
  }
}
  if(!isset($params))  header("location:?p=webinar-mgr&m=2&wid=".$webinar_id);

}

function removeWebinar($wid)
{
  $arr_data["rec_status"]=0;
  $arr_data["modified_date"]=$curTime;
  update_qry("do_webinars",$arr_data,"id=".$wid);
}

function getWebinar($webinarId){

  if($webinarId>0){
    /*
    $result=qry_data("select * from do_webinars where rec_status=1 and id=".$webinarId);
    return array_pop($result);
    */

    $result=qry_data("select W.*,O.name as org_name from do_webinars W LEFT JOIN do_organizers O ON O.id=W.org_id where W.rec_status=1 and  W.id=".$webinarId );
    return array_pop($result);

  }

}


function getWebinarCatIds($webinarId){

  $result=qry_data("select category_id from do_webinar_category where webinar_id=".$webinarId);

  return $result;

}


function getWebinars(){

  $result=qry_data("select W.*,O.name as org_name from do_webinars W LEFT JOIN do_organizers O ON O.id=W.org_id where W.rec_status=1 ");
  return $result;

}
