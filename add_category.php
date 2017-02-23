<?php
// Get the category data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
// Validate inputs
if ($category_id == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
    
    // Add the product to the database  
    $query = 'INSERT INTO categories
                 (categoryID)
              VALUES
                 (:category_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
    // Display the Product List page
    include('index.php');
}
?>
