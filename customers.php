<?php
$page = "Customers";
?>
<!doctype html>
<html lang="en">

<?php include 'component/head.php'; ?>

<body>

<?php include 'component/nav.php'; ?>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <?php include 'component/sidebar.php'; ?>

    <?php 
      include 'functions/customers.php';

      $search = isset($_GET['search']) ? $_GET['search'] : "";
      $customers = getAllCustomers($search);
    ?>

    <!-- MAIN CONTENT -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>
      </div>

      <!-- SEARCH BAR -->
      <form method="GET" class="form-inline mb-3">
        <input type="text" 
               name="search" 
               class="form-control mr-2" 
               placeholder="Search customers..."
               value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-primary">Search</button>
      </form>

      <!-- TABLE -->
      <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead class="thead-light">
            <tr>
              <th>Customer Code</th>
              <th>Lastname</th>
              <th>Firstname</th>
              <th>Phone</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($customers as $c): ?>
              <tr>
                <td><?= $c['cus_code'] ?></td>
                <td><?= $c['cus_lname'] ?></td>
                <td><?= $c['cus_fname'] ?></td>
                <td>(<?= $c['cus_areacode'] ?>) <?= $c['cus_phone'] ?></td>
                <td><?= number_format($c['cus_balance'], 2) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </main>

  </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>