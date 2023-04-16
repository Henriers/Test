<?php include("util/dbhelper.php"); 
		
		$id = array();
			$idno = "";
			$lastname = "";
			$firstname = "";
			$course = "";
			$level = "";
	
			if(isset($_GET["id"]))
			{
				$id = trim($_GET["id"]);
			
				//2. query the record
				$connection = mysqli_connect("localhost", "root", "", "skill");
						
				if($connection)
				{
					$records = mysqli_query($connection, "select * from student where id = ".$id." ");
					
					if(mysqli_num_rows($records) > 0)
					{
						while($rec = mysqli_fetch_row($records))
						{
							$idno = $rec[1];
							$lastname = $rec[2];
							$firstname = $rec[3];
							$course = $rec[4];
							$level = $rec[5];
						}
					}
				}
			}
?>
<html>
	<head>
	<title>Update Student</title>
	</head>
<body>
<div class="w3-container w3-blue">
					<h3>STUDENT INFO</h3>

				</div>
				<div class="w3-padding-large">
					<form action="update.php?id=<?php echo $id?>" method="post">
					<label>ID</label>
					<input type="text" name="id" value=<?php echo $id?>  ReadOnly>
					<p>
						<label><b>IDNO</b></label>
						<input type="text"  name="idno" class="w3-input w3-border" value=<?php echo $idno?>>
					</p>
					<p>
						<label><b>LASTNAME</b></label>
						<input type="text" id="lastname" name="lastname" class="w3-input w3-border" value=<?php echo $lastname?>>
					</p>
					<p>
						<label><b>FIRSTNAME</b></label>
						<input type="text" id="firstname" name="firstname" class="w3-input w3-border" value=<?php echo $firstname?>>
					</p>
					<p>
						<label><b>COURSE</b></label>
						<input type="text" id="course" name="course" class="w3-input w3-border" value=<?php echo $course?>>
					</p>
					<p>
						<label><b>LEVEL</b></label>
						<input type="text" id="level" name="level" class="w3-input w3-border" value=<?php echo $level?>>
					</p> 
					
					<p class="w3-center">
						<?php
							if(isset($_GET['message'])){
								echo $_GET['message'];
							}
						?>
					</p>
					<p>
						<input type="submit" name="save" value="&#128427; SAVE" class="w3-button w3-blue w3-right">
						<br><br>
					</p>
				</form>
				</div>
	</div>
		<?php 
	if(isset($_POST["save"])){
		$idno = trim($_POST["idno"]);
		$lastname = $_POST["lastname"];
		$firstname = $_POST["firstname"];
		$course = $_POST["course"];
		$level = $_POST["level"];
		$id=array();
		
		$id = $_GET["id"];
		$con = dbconnect();
		if(!$con){
			die("Error : ".mysqli_connect_error());
		}
		$sql = "UPDATE `student` SET `idno` = '".$idno."', `lastname` = '".$lastname."', `firstname` = '".$firstname."', `course` = '".$course."', `level` = '".$level."' WHERE `student`.id ='".$id."' ";
			
			mysqli_query($con,$sql);
			
			mysqli_close($con);
			header("location:studentlist.php?message=UPDATE SUCCESS!");
	}
		?>
</body>
</html>