
<?php

$dbtype = "MySQL";

$username = "root";
$password = "";
$hostname = "localhost";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

$selected = mysql_select_db("pixxels",$dbhandle)
  or die("Could not select MASTER_TRACKER_DB");
/*
//execute the SQL query and return records
$result = mysql_query("SELECT SITE_ID, 3G_SITE_ID FROM MASTER_TRACKER WHERE SITE_ID LIKE '%ABK000%'");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "SITE_ID:".$row{'SITE_ID'}." 3G_SITE_ID:".$row{'3G_SITE_ID'}.
   "<br>";
}
*/
$data = new JSONDataConnector($dbhandle, $dbtype);

$data->render_sql("SELECT * FROM usuarios");

//close the connection
mysql_close($dbhandle);
?>
