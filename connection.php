<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "decastro_dms";

$con = new mysqli($dbhost, $dbuser, $dbpass, $db)
    or die("Connect failed: @s\n" . $con->error);