<?php
	$hostname = "127.0.0.1";
	$username = "root";
	$password = "";
	$database = "skill";
	
	function dbconnect(){
		global $hostname,$username,$password,$database;
		return mysqli_connect($hostname,$username,$password,$database);
	}
	
		function getall($table){
		$rows=array();
		$sql="SELECT * FROM `$table`";
			$conn=dbconnect();
			$query=mysqli_query($conn,$sql) or die("SQL Error");
			while($row=mysqli_fetch_assoc($query)){
				array_push($rows,$row);
			}
			mysqli_close($conn);
		return $rows;
	}
	function getrecord($table,$fields,$data){
		$row=null;
		$flds=array();
		if(count($fields)==count($data)){
			//"SELECT * FROM `USER` WHERE `USERNAME`='admin' AND `PASSWORD`='XXX'"
			for($i=0;$i<count($fields);$i++){
				array_push($flds,"`".$fields[$i]."`='".$data[$i]."'");
			}
			$fld=implode(" AND ",$flds);
			$sql="SELECT * FROM `$table` WHERE $fld";
			
			//
			$conn=dbconnect();
			$query = mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($query);
			mysqli_close($conn);
		}
		return $row;
	}
	

?>