<?php

function saveUser(){

  $inputData=$_POST;
  $curTime=getIndianDateTime();
  $user_id=$inputData["uid"];
  $mode=$_GET["m"];

  foreach($inputData as $key => $value) { $arr_data[$key]=$value;}
  foreach($arr_data as $key => $value) { $arr_data[$key]=addslashes($value); }

  $arr_data["rec_status"]=1;
  $arr_data["created_date"]=$curTime;

  if($user_id>0){
    $arr_data["modified_date"]=$curTime;
    update_qry("do_users",$arr_data,"id=".$user_id);
  }
  else{
    $user_id=insert_qry("do_users",$arr_data);
  }

  header("location:?p=user-mgr&m=2&uid=".$user_id);

}

function removeUser($uid)
{
  $arr_data["rec_status"]=0;
  $arr_data["modified_date"]=$curTime;
  update_qry("do_users",$arr_data,"id=".$sid);
}

function getUser($user_id){

  if($user_id>0){
    $result=qry_data("select * from do_users where rec_status=1 and id=".$user_id);
    return array_pop($result);
  }

}

function getUsers(){

  $result=qry_data("select * from do_users where rec_status=1 ");
  return $result;

}
