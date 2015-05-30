<?php


//fetch webinar data from Webinar Urls

function fetchWebinars($orgcode,$webPageUrl){

  $sourcestring=file_get_contents($webPageUrl);

  //$registerLink=getWebinarUrlFromText("sauce",$webPageUrl,$sourcestring);
  $pattern="";
  if($orgcode=="sauce") return parseSauce($sourcestring);
  if($orgcode=="mongodb") return parseMongo($sourcestring);
  if($orgcode=="cloud") return parseCloud($sourcestring);
  if($orgcode=="amazon") return parseAmazon($sourcestring);
  if($orgcode=="couchbase") return parseCouchbase($sourcestring);
  if($orgcode=="cloudbees") return parseCloudBees($sourcestring);
}

function parseMongo($sourcestring){

  $weblinks=[];
  $pattern='/<a(?=\s|>)(?=(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*?\shref=([\'"]?)(.*?)\1(?:\s|\/>|>))(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*>Webinar:(.*?)<\/a>/';
  if(preg_match_all($pattern,$sourcestring,$matches))
    {

    $webinarLinks=array();
    $linkTexts=$matches[3];
    $linkUrls=$matches[2];

    foreach($linkTexts as $i=>$item){

      $webinarLinks[]=array("title"=>$item,"url"=>"http://www.mongodb.com".$linkUrls[$i]);
    }

  }

  return $webinarLinks;
}


function parseCouchbase($sourcestring){

  $weblinks=[];
  $pattern='/<a(?=\s|>)(?=(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*?\shref=([\'"]?)(.*?)\1(?:\s|\/>|>))(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*>(.*?)Couchbase(.*?)<\/a>/';

  if(preg_match_all($pattern,$sourcestring,$matches))
  {
    $webinarLinks=array();
    $linkTexts=$matches[0];
    $linkUrls=$matches[2];

    foreach($linkTexts as $i=>$item){

      $webinarLinks[]=array("title"=>$item,"url"=>$linkUrls[$i]);
    }

  }

  return $webinarLinks;
}



function parseCloudBees($sourcestring){

  $weblinks=[];
  $pattern='/<a(?=\s|>)(?=(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*?\shref=([\'"]?)(.*?)\1(?:\s|\/>|>))(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*>(.*?)Jenkins(.*?)<\/a>/';

  if(preg_match_all($pattern,$sourcestring,$matches))
  {
    $webinarLinks=array();
    $linkTexts=$matches[0];
    $linkUrls=$matches[2];
    print_r($linkUrls);
    exit;
    foreach($linkTexts as $i=>$item){

      $webinarLinks[]=array("title"=>$item,"url"=>$linkUrls[$i]);
    }

  }

  return $webinarLinks;
}




function parseSauce($sourcestring){
  $weblinks=[];
  $pattern='/<a(?=\s|>)(?=(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*?\shref=([\'"]?)(.*?)\1(?:\s|\/>|>))(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*>(.*?)\[WEBINAR]\<\/a>/';
  if(preg_match_all($pattern,$sourcestring,$matches))
  {
      $webinarLinks=array();
      $linkTexts=$matches[3];
      $linkUrls=$matches[2];

      foreach($linkTexts as $i=>$item){

        $webinarLinks[]=array("title"=>$item,"url"=>$linkUrls[$i]);
      }

  }
  return $webinarLinks;
}


function parseCloud($sourcestring){
  $weblinks=[];
  $pattern='/<strong(?=\s|>)(?=(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*?\shref=([\'"]?)(.*?)\1(?:\s|\/>|>))(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*>.*?\cloud\<\/strong>/';
  if(preg_match_all($pattern,$sourcestring,$matches))
  {
      $webinarLinks=array();
      $linkTexts=$matches[3];
      $linkUrls=$matches[2];

      foreach($linkTexts as $i=>$item){

        $webinarLinks[]=array("title"=>$item,"url"=>$linkUrls[$i]);
      }

  }
  print_r($webinarLinks);
  return $webinarLinks;
}

function parseAmazon($sourcestring){
  $weblinks=[];
  $pattern='/<a(?=\s|>)(?=(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*?\shref=([\'"]?)(.*?)\1(?:\s|\/>|>))(?:[^>=]|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*>AWS(.*?)|AWSO(.*?)<\/a>/';

  if(preg_match_all($pattern,$sourcestring,$matches))
  {
      $webinarLinks=array();
      $linkTexts=$matches[3];
      $linkUrls=$matches[2];

      foreach($linkTexts as $i=>$item){

        $webinarLinks[]=array("title"=>$item,"url"=>$linkUrls[$i]);
      }

  }
  return $webinarLinks;
}



?>
