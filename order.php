<?php
    $page = 'Orders';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <style>
        body { font-family: Arial; }

        .search-area {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #e6e6e6;
        }
    </style>
</head>
<body>

<h2>Order Page</h2>

<!-- Search Bar -->
<div class="search-area">
    <form method="GET">
        <input type="text" name="search" placeholder="Search orders..."
               value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"
               style="padding: 6px; width: 250px;">
        <button type="submit" style="padding: 6px;">Search</button>
    </form>
</div>

<?php
$search = isset($_GET['search']) ? $_GET['search'] : "";
$orders = getAllOrders($search);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Date</th>
        <th>SubTotal</th>
        <th>Tax</th>
        <th>Total</th>
    </tr>

    <?php foreach ($orders as $row): ?>
        <tr>
            <td><?= $row['inv_number'] ?></td>
            <td><?= $row['customer_name'] ?></td>
            <td><?= strtoupper(date("d M Y", strtotime($row['inv_date']))) ?></td>
            <td><?= number_format($row['inv_subtotal'], 2) ?></td>
            <td><?= number_format($row['inv_tax'], 2) ?></td>
            <td><?= number_format($row['inv_total'], 2) ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>