<?php

function SaveCategory(){

  $inputData=$_POST;
  $curTime=getIndianDateTime();
  $category_id=$inputData["cid"];
  $mode=$_GET["m"];

  foreach($inputData as $key => $value) { $arr_data[$key]=$value;}
  foreach($arr_data as $key => $value) { $arr_data[$key]=addslashes($value); }

  $arr_data["rec_status"]=1;
  $arr_data["created_date"]=$curTime;

  if($category_id>0){
    $arr_data["modified_date"]=$curTime;
    update_qry("do_category",$arr_data,"id=".$category_id);
  }
  else{
    $category_id=insert_qry("do_category",$arr_data);
  }

  header("location:?p=category-mgr&m=2&cid=".$category_id);

}

function removeCategory($cid)
{
  $arr_data["rec_status"]=0;
  $arr_data["modified_date"]=$curTime;
  update_qry("do_category",$arr_data,"id=".$cid);
}

function getCategory($category_id){

  if($category_id>0){
    $result=qry_data("select * from do_category where rec_status=1 and id=".$category_id);
    return array_pop($result);
  }

}

function getCategories(){

  $result=qry_data("select * from do_category where rec_status=1 ");
  return $result;

}
