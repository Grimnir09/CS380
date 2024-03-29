<?php
require_once('database.php');

// Get IDs
$category_id = filter_input(INPUT_POST, 'delete_category', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($category_id != false) {
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the category List page
include('category_list.php');