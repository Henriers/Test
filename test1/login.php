<?php

include("util/dbhelper.php");
session_start();
if(isset($_POST["username"]) && isset($_POST["password"]) )
$user = $_POST["username"];
$pass = $_POST["password"];

$row = getrecord('user',['user','password'],[$user,$pass]);

if($row != null){
    $_SESSION['user']=$user;
    header("location:studentlist.php?message=SUCCESS!");
}
else
{
    header("location:index.php?message=LOGIN FAILED!");
}






?>