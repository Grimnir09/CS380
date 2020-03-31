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

        <?php 
        $query = 'SELECT categories.categoryName, categories.categoryID FROM categories ORDER BY categories.categoryName';
        $statement2 = $db->prepare($query);
        $statement2->execute();
        $categories = $statement2->fetchAll();
        $statement2->closeCursor();
        ?>
            <!-- add code for the rest of the table here -->
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td>
                        <?php echo $category['categoryName']; ?>
                    </td>
                    <td>
                        <form action="delete_category.php" method='POST'>
                            <input type="hidden" name="delete_category" value="<?php echo $category['categoryID']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>

    <h2>Add Category</h2>
    
    <form action="add_category.php" method="POST">
        <label for="add_category">Name: </label>
        <input type="text" name="categoryName" id="addCategory">
        <button type="submit">Add</button>
    </form>
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>