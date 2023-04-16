<?php
	$id =array();
	$id = $_GET["id"];
	$con = mysqli_connect("localhost","root","","skill");
	$que = "delete from student where id ='".$id."'";
	$data = mysqli_query($con, $que);
	if(!$data){
		header("location:studentlist.php?message=ERROR DELETING ");
	}
	header("location:studentlist.php?message=STUDENT DELETED");
	mysqli_close($con);



?>
<html>
	<head>
	<title>Deleted Request</title>
	</head>
<body>

</body>
</html>
