<?php

include 'config.php';

$host=$DATABASE_HOST;
$con = mysql_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS);
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("pmine123", $con);
?>