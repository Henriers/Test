<?php

$local = "127.0.0.1";
$auname="root";
$apword="";
$database="skillstest";

function dbconnect(){
    global $local,$auname,$apword,$database;
        return mysqli_connect($local,$auname,$apword,$database);

}

function getall($table){
    $rows = array();
    $con = dbconnect();
    $sql = "SELECT student.id, student.idno,student.firstname,student.lastname,user.user,user.password FROM `$table` inner join
            `user`on student.idno = user.idno order by student.idno";
    $query = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function getrecord($table,$fields,$data){
    $rows=null;
    $fld = array();
    if(count($fields)==count($data)){
        for($i=0;$i<count($fields);$i++){
        array_push($fld,"`".$fields[$i]."`='".$data[$i]."'");
                }
    }
    $flds = implode(" AND ",$fld);
    $sql = "SELECT * FROM `$table` WHERE $flds";
    $con = dbconnect();
    $query= mysqli_query($con,$sql);
    $rows = mysqli_fetch_row($query);
    mysqli_close($con);
    return $rows;
}


?>