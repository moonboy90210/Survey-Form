<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "surv_form";


if(!$con = mysqli_connect ($dbhost, $dbuser, $dbpass,$dbname))
{
    die("failed to connect!");
}
//connect your DB one line code
//$conn = mysqli_connect("localhost", "root", "", "surv_form");


