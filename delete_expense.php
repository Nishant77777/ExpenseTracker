<?php
if (isset($_GET['id'])) {
    $expenseId = $_GET['id'];

    // Connect to the database
    $conn = pg_connect("host=localhost dbname=expense_tracker user=postgres password=5056");

    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    // Perform the deletion operation
    $deleteQuery = "DELETE FROM expenses WHERE id = $expenseId";
    $deleteResult = pg_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Successful deletion
        header("Location: process_expense.php"); // Redirect back to the main page
        exit;
    } else {
        // Error handling if deletion fails
        echo "Error deleting expense: " . pg_last_error($conn);
    }

    // Close the database connection
    pg_close($conn);
}
?>

 