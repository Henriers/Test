
<?php
    include("util/dbhelper.php");
    session_start();
    if($_SESSION['user']==null) header("location:index.php?message=LOGIN PROPERLY");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Student Info</title>
    <a href="logout.php" ><button >LOGOUT</button></a>
    <a href="search.php"><button>Search</button></a>
</head>
<body>
    <a href="add_student.php"><button>ADD</button></a>
    <p><?php
        if(isset($_GET['message'])){
            echo $_GET['message'];
        }
    ?></p>
        <table>
            
            <?php

            $header = ['id','idno','firstname','lastname','user','password'];
                echo "<tr>";
                foreach($header as $h){
                echo  "<th>".strtoupper($h)."</th>";
                }
                echo "</tr>";
                $list = getall('student');
                foreach($list as $student){
                    echo "<tr>";
                    echo "<td>".$student['id']."</td>";
                    echo "<td>".$student['idno']."</td>";
                    echo "<td>".$student['firstname']."</td>";
                    echo "<td>".$student['lastname']."</td>";
                    echo "<td>".$student['user']."</td>";
                    echo "<td>".$student['password']."</td>";
                    echo "<td><button onclick=removeitem(".$student['id'].")>DELETE</button></a> </td>";
                    echo "<td><button onclick=updateitem(".$student['id'].")>UPDATE</button></a> </td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <div>
        <form method="POST" action ="studentlist.php">
        <input type ="text" name = "key" placeholder="Search here">
        <button type="submit" name = "search">SEARCH</button>
        <table>
            <?php
           
            if(isset($_POST["search"])){
                 $keyword = $_POST["key"];
                $con = dbconnect();
                $sql = "SELECT * FROM `student` WHERE `id` LIKE '%$keyword%' or `idno` LIKE '%$keyword%' or `firstname` LIKE '%$keyword%' or 
                `lastname` LIKE '%$keyword%' order by id, idno";
                $query = mysqli_query($con,$sql);
                $rows=array();
                if(mysqli_num_rows($query)<0){
                    header("location:studentlist.php?message=NO SUCH KEYWORD");
                }

                while($rows=mysqli_fetch_row($query)){
                    echo "<tr>";
                    echo "<td>".$rows[0]."</td>";
                    echo "<td>".$rows[1]."</td>";
                    echo "<td>".$rows[2]."</td>";
                    echo "<td>".$rows[3]."</td>";
                    echo "</tr>";
                }
                mysqli_close($con);

            }
            ?>
        </table>
            </div>
        
        <script>
			
			function removeitem(id){
				var ok=confirm("Do you want to delete this student?");
				if(ok)
					location.href="delete.php?id="+id;
			}
			
			function updateitem(id){
					location.href="update.php?id="+id;
			}
			
			
		</script>
</body>
</html>