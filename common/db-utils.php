<?php

function exec_qry($query)
{
  return mysql_query($query);
}


function qry_data($query)
{

  $dbr_queryResult=exec_qry($query);
  if ($dbr_queryResult) {


    $int_resultCounter = 0;
    $arr_result = Array ();

    while ($arr_fetchedResult = @mysql_fetch_array ($dbr_queryResult)) {
      // remove slashes if needed

      while (list ($mix_key, $mix_val) = each ($arr_fetchedResult)) {
        // if the value is a string, un-escape it
        if (gettype ($mix_val) == "string" ) {
          $arr_fetchedResult[$mix_key] = stripslashes($mix_val);
        }
      }

      // create resulting array
      $arr_result[$int_resultCounter] = $arr_fetchedResult;
      $int_resultCounter ++;
    }


    return ($arr_result);
  }

}

function qry_data_api($query)
{

  $dbr_queryResult=exec_qry($query);
  if ($dbr_queryResult) {


    $int_resultCounter = 0;
    $arr_result = Array ();

    while ($arr_fetchedResult = @mysql_fetch_array ($dbr_queryResult)) {
      // remove slashes if needed
      $m=1;
      while (list ($mix_key, $mix_val) = each ($arr_fetchedResult)) {
        // if the value is a string, un-escape it

        if (gettype ($mix_key) == "string" ) {

            $arr_fetchedResult[$mix_key] = stripslashes($mix_val);
            unset($arr_fetchedResult[0]);
            unset($arr_fetchedResult[1]);
            unset($arr_fetchedResult[2]);
            unset($arr_fetchedResult[3]);
        }
      }

      // create resulting array
      $arr_result[$int_resultCounter] = $arr_fetchedResult;
      $int_resultCounter ++;
    }


    return ($arr_result);
  }

}

function insert_qry($str_table,$arr_data)
{

  $bol_enclose=true;
  $arr_columns = qry_data("SHOW COLUMNS FROM ".$str_table."");

  $str_query = "INSERT INTO ".$str_table." SET ";
  foreach ($arr_columns as $arr_col) {
    if ($arr_data[$arr_col["Field"]]) {
      if ($bol_enclose)
      $str_query .= $arr_col["Field"]."='".$arr_data[$arr_col["Field"]]."', ";
      else
      $str_query .= $arr_col["Field"]."=".$arr_data[$arr_col["Field"]].", ";
    }
  }
  $str_query = substr($str_query, 0, -2);     // ", " abhacken
  exec_qry ( $str_query );
  echo $str_query;
  return mysql_insert_id();

}

function enclose($strText)
{
  return "'".$strText."'";

}
function update_qry($str_table,$arr_data,$str_where="")
{

  $bol_enclose=true;

  $arr_columns = qry_data("SHOW COLUMNS FROM ".$str_table."");
  //echo "<pre>";
  //print_r($arr_data);
  //exit;
  $str_query = "UPDATE ".$str_table." SET ";
  foreach ($arr_columns as $arr_col) {
    if (isset($arr_data[$arr_col["Field"]])) {
      if ($bol_enclose) {
        $str_query .= $arr_col["Field"]."='".$arr_data[$arr_col["Field"]]."', ";
      } else {
        $str_query .= $arr_col["Field"]."=".$arr_data[$arr_col["Field"]].", ";
      }
    }
  }

  $str_query = substr($str_query, 0, -2);     // ", " abhacken

  $str_query .= " WHERE ( ".$str_where." )";
  //echo $str_query ;
  //exit;
  exec_qry( $str_query );

}

function delete_qry($tblName,$where="")
{



}
