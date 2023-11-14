<?php
  include"../config/connect.php";
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Create
    if(isset($_POST['create'])){
      $title = $_POST['title'];
      $copyright = $_POST['copyright'];
      $edition = $_POST['edition'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];

      $sql = "INSERT INTO books (title, copyright, edition, price, quantity) VALUES ('$title', '$copyright', '$edition', '$price', '$quantity')";

      if($conn->query($sql)){
        Header("Location:../pages/index.php");
      }
      echo "ERROR! Created unsuccessfully";
    }

    elseif(isset($_POST['update'])){
      $isbn = $_POST['ISBN'];
      $title = $_POST['title'];
      $copyright = $_POST['copyright'];
      $edition = $_POST['edition'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];

      $sql = "UPDATE books SET title='$title', copyright='$copyright', edition='$edition', price='$price', quantity='$quantity' WHERE ISBN = $isbn";

      if($conn->query($sql)){
        Header("Location:../pages/index.php");
      }
      echo "ERROR! Created unsuccessfully";
    }

    elseif(isset($_POST['delete'])){
      $isbn = $_POST['isbn'];

      $sql = "DELETE FROM books WHERE isbn=$isbn";
  
      if($conn->query($sql)){
        Header("Location:../pages/index.php");
      }
      echo "ERROR! Created unsuccessfully";
    }
  }
?>