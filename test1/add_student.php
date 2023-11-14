<?php
    include("util/dbhelper.php");
    $password ="";
    $idno = "";
    $fname = "";
    $lname = "";
    $user ="";
    if(isset($_POST["save"])){
        $idno = $_POST["idno"];
        $fname =trim($_POST["firstname"]);
        $lname =trim($_POST["lastname"]);
        $password = trim($_POST["password"]);
        $user =trim($_POST["username"]);

        $con = dbconnect();
        $sqli = "INSERT INTO `user` (`idno`,`user`,`password`) VALUES ('$idno','$user', '$password')";
        $sql = "INSERT INTO `student` (`idno`,`firstname`,`lastname`) VALUES ('$idno','$fname','$lname')";
        $queryi=mysqli_query($con,$sqli);
        $query = mysqli_query($con,$sql);
        mysqli_close($con);
        header("location:studentlist.php?message=SUCCESS!");


    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>ADD STUDENT</title>
</head>
<body>
    <a href="studentlist.php" >GO BACK</a>
    <form method ="POST" action ="add_student.php">
        <p>IDNO</p>
        <input type="text" name="idno" placeholder="IDNO">
        <p>username</p>
        <input type="text" name="username" placeholder="password">
        <p>password</p>
        <input type="text" name="password" placeholder="password">
        <p>firstname</p>
        <input type="text" name="firstname" placeholder="firstname">
        <p>lastname</p>
        <input type="text" name="lastname" placeholder="lastname">
        
        <button type = "submit" name="save">SAVE</button>
    </form>
</body>
</html>
