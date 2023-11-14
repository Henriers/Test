<?php
  include "../config/connect.php";
  $isbn = $_GET['isbn'];

  $sql = "SELECT * FROM books WHERE isbn = $isbn";
  $books = mysqli_query($conn,$sql);
  $book = mysqli_fetch_assoc($books);

  $title = $book['title'];
  $copyright = $book['copyright'];
  $edition = $book['edition'];
  $price = $book['price'];
  $quantity = $book['quantity'];
?>

<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Edit Book</title>
<div class="w3-card w3-padding-3" style="margin-top: 10px;">
  <form action="../controllers/bookController.php" method="POST">
    <input type="hidden" name="ISBN" id="" value="<?php echo "$isbn" ?>">

    <div class="items" style="margin-top: 4rem;">
      <label for="" class="">Title</label>
      <input type="text" name="title" id="" class="w3-input" value="<?php echo "$title" ?>">
    </div>

    <div class="items">
      <label for="" class="">Copyright</label>
      <input type="text" name="copyright" id="" class="w3-input" value="<?php echo "$copyright" ?>">
    </div>

    <div class="items">
      <label for="" class="">Edition</label>
      <input type="text" name="edition" id="" class="w3-input" value="<?php echo "$edition" ?>">
    </div>

    <div class="items">
      <label for="" class="">Price</label>
      <input type="text" name="price" id="" class="w3-input" value="<?php echo "$price" ?>">
    </div>

    <div class="items">
      <label for="" class="">Quantity</label>
      <input type="text" name="quantity" id="" class="w3-input" value="<?php echo "$quantity" ?>">
    </div>

    <div class="w3-container w3-margin-top">
      <button type="submit" name="update" class="w3-button">update</button>
      <a type="submit" href="../pages/index.php" class="w3-button">back</a>
    </div>
  </form>
</html>