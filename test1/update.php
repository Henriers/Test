<?php
    include("util/dbhelper.php");
    $id = array();
    $id = $_GET['id'];
    $idno = "";
    $fname = "";
    $lname = "";
    
    $con = dbconnect();
    $sqli = "SELECT * FROM `student` WHERE `id` = '".$id."'";
    $que = mysqli_query($con,$sqli);

    if(mysqli_num_rows($que)>0){
        while($rec = mysqli_fetch_row($que)){
            $id = $rec[0];
            $idno = $rec[1];
            $firstname = $rec[2];
            $lastname = $rec[3];
        }
    }
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>UPDATE STUDENT</title>
</head>
<body>
    <a href="studentlist.php" >GO BACK</a>
    <form method ="POST" action ="update.php?id=<?php echo $id?>">
        <p>ID</p>
        <input type="text" name="idno" value = "<?php echo $id?>" readOnly> 
        <p>IDNO</p>
        <input type="text" name="idno" value = "<?php echo $idno?>"> 
        <p>firstname</p>
        <input type="text" name="firstname" value = "<?php echo $firstname?>">
        <p>lastname</p>
        <input type="text" name="lastname" value = "<?php echo $lastname?>">
        <button type = "submit" name="update">UPDATE</button>
    </form>
    <?php
    if(isset($_POST["update"])){
        $id = $_GET["id"];
        $idno = $_POST["idno"];
        $fname =trim($_POST["firstname"]);
        $lname =trim($_POST["lastname"]);

        $con = dbconnect();
        $sql = "UPDATE  `student` SET `idno` = '".$idno."' , `firstname` = '".$fname."', `lastname` = '".$lname."' WHERE `id` ='".$id."'";
        $query = mysqli_query($con,$sql);
        if(!$query){
            header("location:update.php?message=ERROR");
        }
        mysqli_close($con);
        header("location:studentlist.php?message=SUCCESS!");


    }
    
    ?>
</body>

</html>
