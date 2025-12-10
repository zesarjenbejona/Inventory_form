<?php 
include 'db.php';
$result = $conn->query("SELECT * FROM inventory");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Records</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-success text-white text-center fs-4 py-3 rounded-top-4">
            Inventory Records
        </div>

        <div class="card-body p-4">

            <!-- Navigation Button -->
            <div class="mb-3 text-end">
                <a href="inventory_form.html" class="btn btn-primary btn-lg">
                    Add New Inventory Item
                </a>
            </div>

            <!-- DataTable -->
            <table id="inventoryTable" class="table table-striped table-hover table-bordered rounded-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Date Added</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['product_name']; ?></td>
                        <td><?= $row['quantity']; ?></td>
                        <td><?= $row['category']; ?></td>
                        <td><?= $row['price']; ?></td>
                        <td><?= $row['date_added']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#inventoryTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Export to Excel',
                className: 'btn btn-success',
                action: function () {
                    window.location.href = 'export_inventory.php';
                }
            }
        ]
    });
});
</script>

</body>
</html>
