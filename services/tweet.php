<?php include_once("libs/twitter/twitter.class.php");
//Publish a tweet to Twitter from Dockinar official Twitter Account

function tweetToDockinar($params){

  $tweet=$params["title"]." ".$params["url"]." by #".$params["org_name"];
  //These are Dockinar Specific
  $consumerKey="GdvMGdYN3opIZ3c3mFjvf1bTr";
  $consumerSecret="weveNeRhFwdTNLi3jWKXN0J2nH4XxcF2sZRd9XZyFKz2zEtoIq";
  $accessToken="3188292246-OGK2BWNoeccQ9AFXQltay3fyZqof644Gm2SV1q6";
  $accessTokenSecret="fnoDq1Rjq5sOqyD6glmkuG1pajcNV350jG5GGYMVaQTyd";

  $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

  try {
    $tweet = $twitter->send($tweet); // you can add $imagePath as second argument

  } catch (TwitterException $e) {
    echo 'Error: ' . $e->getMessage();
  }

}
