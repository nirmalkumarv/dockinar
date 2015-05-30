<?php

function saveOrganizer(){

  $inputData=$_POST;
  $curTime=getIndianDateTime();
  $org_id=$inputData["oid"];
  $mode=$_GET["m"];

  foreach($inputData as $key => $value) { $arr_data[$key]=$value;}
  foreach($arr_data as $key => $value) { $arr_data[$key]=addslashes($value); }

  $arr_data["rec_status"]=1;
  $arr_data["created_date"]=$curTime;

  if($org_id>0){
    $arr_data["modified_date"]=$curTime;
    update_qry("do_organizers",$arr_data,"id=".$org_id);
  }
  else{
    $org_id=insert_qry("do_organizers",$arr_data);
  }


  header("location:?p=org-mgr&m=2&oid=".$org_id);

}

function removeOrganizer($oid)
{
  $arr_data["rec_status"]=0;
  $arr_data["modified_date"]=$curTime;
  update_qry("do_organizers",$arr_data,"id=".$oid);
}

function getOrganizer($org_id){

  if($org_id>0){
    $result=qry_data("select * from do_organizers where rec_status=1 and id=".$org_id);
    return array_pop($result);
  }

}

function getOrganizers(){

  $result=qry_data("select O.*,C.name as cat_name from do_organizers O LEFT JOIN do_category C ON O.default_category_id=C.id where O.rec_status=1 ");
  return $result;

}
