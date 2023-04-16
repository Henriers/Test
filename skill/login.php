<?php
	///login validator
	session_start();
	include("util/dbhelper.php");
	
	if(isset($_POST['username']) && isset($_POST['password'])){
		$uname=$_POST['username'];
		$pword=$_POST['password'];
		$row=getrecord('user',['username','password'],[$uname,$pword]);
		if($row!=null){
			$_SESSION['user']=$uname;
			header("location:studentlist.php?user=".$uname);
		}
		else
			header("location:index.php?message=INVALID USER");
	}
?>