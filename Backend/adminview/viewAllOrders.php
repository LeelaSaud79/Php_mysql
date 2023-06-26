<?php
session_start();
require_once('../config/dbconnect.php');
$query = "SELECT * from finalorder";
$result = mysqli_query($conn, $query);
?>
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