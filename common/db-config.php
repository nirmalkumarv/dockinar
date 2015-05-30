<?php

$host="localhost";
$username="root";
$password="root";
$db_name ="dockinar_db";


$dbconn = mysql_connect( $host, $username,$password) or die('Could not connect. The data may not have been processed, please contact the system administrator!');
mysql_select_db($db_name);
