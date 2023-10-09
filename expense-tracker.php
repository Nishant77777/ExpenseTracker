<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add some basic CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        h1 {
            margin: 0;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }
        th, td {
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Expense Tracker</h1>
    </header>
    <main>
        <form id="expenseForm" method="POST" action="process_expense.php">
            <label for="expense">Expense:</label>
            <input type="text" id="expense" name="expense" required><br><br>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required><br><br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required><br><br>
            <input type="submit" value="Add Expense">
        </form> 
        <table id="expenseTable">
            <tr>
                <th>Expense</th>
                <th>Category</th>
                <th>Date</th>
                <th>Amount</th>
            </tr>

        </table>
    </main>
    <footer>
        <p>Copyright © Expense Tracker</p>
    </footer>

    
    </script>
</body>
</html>
