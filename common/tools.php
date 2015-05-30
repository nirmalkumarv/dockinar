<?php


  function getIndianDateTime()
  {

    $timeNdate=date('Y-m-d H:i:s', time() + 19750);

    return $timeNdate;

  }


    function writeActivityLog($log_remarks,$log_content="",$user_type=0,$log_type=0){

      $curTime=getIndianDateTime();
      if($user_type==0)
      $user_id=$_SESSION["user_id"];
      else
      $user_id=$user_type;

      $log_type=0;
      if($log_content!="") $log_type=1;
      $ip=$_SERVER['REMOTE_ADDR'];
      $log_remarks=addslashes($log_remarks);
      $query_insert_log="INSERT INTO do_user_activity(log_date,user_type,user_id,log_type,log_remarks,log_content,ip_address) ";
      $query_insert_log.="VALUES('".$curTime."','".$user_type."','".$user_id."','".$log_type."','".$log_remarks."','".$log_content."','".$ip."')";

      exec_qry($query_insert_log);

    }

    function ast(){

      return "<span class='ast'>*</span>";
    }




    function redirect($page){

      header("location:".$page);
    }
