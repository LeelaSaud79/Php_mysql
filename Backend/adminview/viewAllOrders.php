<?php


session_start();

if (!isset($_SESSION['username'])) {
  // header('location: login.php');
  header('location: http://localhost/frontend/cover/Login.php');
  exit;

}

require_once('../config/dbconnect.php');
$query = "SELECT * from finalorder";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-PSW1MY7HB4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-PSW1MY7HB4');
  </script>
</head>

<h2>Final Order items</h2>
<div class=" card-body">
  <table class=" table table-bordered text-center">
    <tr class=" bg-dark text-white">
      <td>final_id</td>
      <td>Order_id</td>
      <td>Billing_id</td>
      <td>Shipment_id</td>
      <td>Actions</td>
    </tr>
    <tr>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <td>
          <?php echo $row['final_id']; ?>
        </td>
        <td>
          <?php echo $row['order_id']; ?>
        </td>
        <td>
          <?php echo $row['bill_id']; ?>
        </td>
        <td>
          <?php echo $row['ship_id']; ?>
        </td>
        <td>
          <a href="./adminview/product_Details.php?final_id=<?php echo $row['final_id']; ?>">View Details</a>
        </td>
      </tr>


      <?php
      }
      ?>
  </table>

</div>
</html>