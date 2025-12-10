<?php
include 'db.php';

$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$price = $_POST['price'];
$date_added = $_POST['date_added'];

$sql = "INSERT INTO inventory (product_name, quantity, category, price, date_added) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sisss", $product_name, $quantity, $category, $price, $date_added);

if ($stmt->execute()) {
    echo "Item saved successfully!";
} else {
    echo "Error saving item.";
}
?>
