<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Search</title>

</head>
<body>
      <form method="POST" action ="search.php">
        <input type ="text" name = "key" placeholder="Search here">
        <button type="submit" name = "search">SEARCH</button>
        <table>
            <?php
            include("util/dbhelper.php");
            if(isset($_POST["search"])){
                 $keyword = $_POST["key"];
                $con = dbconnect();
                $sql = "SELECT * FROM `student` WHERE `id` LIKE '%$keyword%' or `idno` LIKE '%$keyword%' or `firstname` LIKE '%$keyword%' or 
                `lastname` LIKE '%$keyword%' order by firstname, lastname";
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
</body>
</html>