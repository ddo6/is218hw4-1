<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
      
      <?php foreach ($categories as $category) : ?>
            <tr>
              <td><?php echo $category['categoryName']; ?></td>
              
                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
      <?php endforeach; ?>
        
        <!-- add code for the rest of the table here -->
    
    </table>
    
    <!-- add code for the form here -->
  <h1>Add Product</h1>
        <form action="add_product.php" method="post"
              id="add_product_form">
          
          <label>Name:</label>
            <input type="text" name="category_id"><br>
          <label>&nbsp;</label>
            <input type="submit" value="Add Category"><br>
          
  </form>
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>
