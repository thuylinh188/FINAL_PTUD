<?php
// Get the order ID from the GET request
$id = $_GET['id'] ?? '';

// Check if the ID is valid (non-empty)
if (!empty($id)) {
    // Connect to the database
    require('../includes/db.php');

    // Prepare the DELETE query
    $sql = "DELETE FROM `orders` WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect to the orders list page after successful deletion
        header("Location: ./listorders.php");
        exit;
    } else {
        // Output error message if deletion fails
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If no ID is provided, redirect to the orders list page
    header("Location: ./listorders.php");
    exit;
}
?>
