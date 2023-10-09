<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS for form and message */
        form {
            margin: 20px 0;
            
            
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
            
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: yellow;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .message {
            color: green;
            font-weight: bold;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }

        /* CSS for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: pink;
            color: #fff;
        }
        /* Style for the "Delete" keyword */
.delete-link {
    color: #ff0000; /* Red color for the text */
    text-decoration: underline; /* Underline the text */
    font-weight: bold; /* Make the text bold */
    cursor: pointer; /* Change the cursor to a pointer on hover */
}

    </style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data submitted from the form
    $expense = $_POST['expense'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    // Validate the data (e.g., check if the date is in a valid format, amount is a number, etc.)
    // You should add appropriate validation code here.

    // Connect to PostgreSQL database
    $conn = pg_connect("host=localhost dbname=expense_tracker user=postgres password=5056");

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    // Insert data into the database
    $query = "INSERT INTO expenses (expense, category, date, amount) VALUES ('$expense', '$category', '$date', '$amount')";
    $result = pg_query($conn, $query);

    // Check if the insertion was successful
    if ($result) {
        echo "<p class='success-message'>Expense added successfully.</p>";
    } else {
        echo "<p class='error-message'>Error adding expense: " . pg_last_error($conn) . "</p>";
    }

    // Close PostgreSQL connection
    pg_close($conn);
}
?>
    <form method="POST">
        <label for="expense">Expense:</label>
        <input type="text" id="expense" name="expense" required><br><br>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br><br>
        <input type="submit" name="addExpense" value="Add Expense">
    </form>

    <?php
// Connect to PostgreSQL database
$conn = pg_connect("host=localhost dbname=expense_tracker user=postgres password=5056");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Retrieve all expenses from the database
$query = "SELECT * FROM expenses ORDER BY date DESC";
$result = pg_query($conn, $query);

// Check if there are any expenses
if (pg_num_rows($result) > 0) {
    echo "<h2>Expenses:</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Expense</th>";
    echo "<th>Category</th>";
    echo "<th>Date</th>";
    echo "<th>Amount</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    

    // Loop through each expense and display it in a table row
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['expense'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "<td><a href='delete_expense.php?id=" . $row['id'] . "'><span class='delete-link'>Delete</span></a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No expenses found.</p>";
}
            // Close PostgreSQL connection
            pg_close($conn);
            ?>
            
</body>
</html>
