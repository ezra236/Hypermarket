<?php
// Initialize variables with default values
$buying_price = 0;
$vat = 0;
$general_expense = 0;
$profit_margin = 0;
$total_general_expense = 0;
$selling_price = 0;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Update variables from form input
    $buying_price = isset($_POST['buying_price']) ? $_POST['buying_price'] : 0;
    $vat = isset($_POST['vat']) ? $_POST['vat'] : 0;
    $general_expense = isset($_POST['general_expense']) ? $_POST['general_expense'] : 0;
    $profit_margin = isset($_POST['profit_margin']) ? $_POST['profit_margin'] : 0;

    // Calculate total general expense
    $total_general_expense = $buying_price * ($general_expense / 100);

    // Calculate selling price
    $selling_price = $buying_price + ($buying_price * ($vat / 100)) + $total_general_expense + ($buying_price * ($profit_margin / 100));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta type="author" name="Ezra">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hypermarket Product Pricing Results</title>
    <style>
        h2 {
            text-align: center;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Results</h2>
    <table>
        <tr><td>Buying Price:</td><td>$<?php echo number_format($buying_price, 2); ?></td></tr>
        <tr><td>VAT:</td><td><?php echo $vat; ?>%</td></tr>
        <tr><td>Total General Expense:</td><td>$<?php echo number_format($total_general_expense, 2); ?></td></tr>
        <tr><td>Profit Margin:</td><td><?php echo $profit_margin; ?>%</td></tr>
        <tr><td>Selling Price:</td><td>$<?php echo number_format($selling_price, 2); ?></td></tr>
    </table>
</body>
</html>
