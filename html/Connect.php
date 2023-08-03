<?php
$sname="localhost";
$uname="Testy";
$password="Testy20190084";

$db_name="tasty_db";

$conn=mysqli_connect($sname,$uname,$password,$db_name);
if(!$conn)
{
    echo "Connection Failed";
}

//Testy20190084