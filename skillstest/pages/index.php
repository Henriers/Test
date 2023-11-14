<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Dashboard</title>
<body>
  <div class="w3-container w3-card">
    WELCOME 
  </div>
  <div class="w3-card w3-padding-3" style="margin-top: 10px;">
    <form action="../controllers/bookController.php" method="POST">
      <input type="hidden" name="ISBN" id="" value="">

      <div class="items" style="margin-top: 4rem;">
        <label for="" class="">Title</label>
        <input type="text" name="title" id="" class="w3-input">
      </div>

      <div class="items">
        <label for="" class="">Copyright</label>
        <input type="text" name="copyright" id="" class="w3-input">
      </div>

      <div class="items">
        <label for="" class="">Edition</label>
        <input type="text" name="edition" id="" class="w3-input">
      </div>

      <div class="items">
        <label for="" class="">Price</label>
        <input type="text" name="price" id="" class="w3-input">
      </div>

      <div class="items">
        <label for="" class="">Quantity</label>
        <input type="text" name="quantity" id="" class="w3-input">
      </div>

      <div class="w3-container w3-margin-top">
        <button type="submit" name="create" class="w3-button">create</button>
      </div>
    </form>

    <form action="" method="POST">
      <div>
        <input type="text" placeholder="search by id" name="search">
        <button type="submit" class="w3-button">Search</button>
      </div>
    </form>

    <div class="w3-margin-top w3-card">
      <table class="w3-table-all">
        <thead>
          <tr>
            <th>Title</th>
            <th>Copyright</th>
            <th>Edition</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include "../config/connect.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $search = $_POST['search'];
              if($search){
                $sql = "SELECT * FROM books WHERE isbn LIKE '$search' OR title LIKE '$search' OR copyright LIKE '$search' OR edition LIKE '$search'";
              }else{
                $sql = "SELECT * FROM books ORDER BY price DESC";
              }
              $books = mysqli_query($conn,$sql);

              if($books->num_rows > 0)
              {
                while($book = $books->fetch_assoc()){
                  $isbn = $book['ISBN'];
                  $totalProduct = $book['price'] * $book['quantity'];
                  echo "<tr>";
                  echo "<td>" . $book["title"]. "</td>";
                  echo "<td>" . $book["copyright"]. "</td>";
                  echo "<td>" . $book["edition"]. "</td>";
                  echo "<td>" . $book["price"]. "</td>";
                  echo "<td>" . $book["quantity"]. "</td>";
                  echo "<td>" . $totalProduct. "</td>";
                  echo 
                  "<td>
                    <a href='edit.php?isbn=$isbn'>EDIT</a>
                    <form action='../controllers/bookController.php' method='POST'>
                      <input type='hidden' name='isbn' value='$isbn'>
                      <button type='submit' name='delete'>DELETE</button>
                    </form>
                  </td>";
                  echo "</tr>";
                }
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>