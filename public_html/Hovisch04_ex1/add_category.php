<?php
// Get the category data
$name = filter_input(INPUT_POST, 'categoryName');

// Validate inputs
if (!isset($name)) {
    $error = 'Category name must not be empty!';
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO categories
                 (categoryID, categoryName)
              VALUES
                 (NULL, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('category_list.php');
}
?>