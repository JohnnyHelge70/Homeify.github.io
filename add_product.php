<?php
// Include the necessary files and configurations

// Include the database connection code
include('db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the product information from the form
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    // Create the SQL query to insert the product into the products table
    $sql = "INSERT INTO products (product_name, product_price, product_description) VALUES ('$product_name', $product_price, '$product_description')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully.";
    } else {
        echo "Error adding product: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
<!-- Add the following code to the add_product.php file -->

<form method="POST" action="">
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required>

    <label for="product_price">Product Price:</label>
    <input type="number" name="product_price" required>

    <label for="product_description">Product Description:</label>
    <textarea name="product_description" required></textarea>

    <input type="submit" value="Add Product">
</form>
