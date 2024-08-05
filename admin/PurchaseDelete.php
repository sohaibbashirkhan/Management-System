<?php
include_once("DatabaseConn.php");

$id = $_GET["id"];

// Get purchase details to update product quantity
$get_purchase_query = "SELECT `product_id`, `quantity` FROM `purchase` WHERE `id` = $id";
$result = mysqli_query($conn, $get_purchase_query);

if (!$result) {
    echo "Error fetching purchase details: " . mysqli_error($conn);
    exit; // Exit script if there's an error
}

$row = mysqli_fetch_assoc($result);
$productid = $row['product_id'];
$quantity = $row['quantity'];

// Update product quantity
$update_product_query = "UPDATE `product` SET `quantity` = `quantity` - $quantity WHERE `id` = $productid";
if (!mysqli_query($conn, $update_product_query)) {
    echo "Error updating product quantity: " . mysqli_error($conn);
    exit; // Exit script if there's an error
}

// Delete purchase record
$query = "DELETE FROM `purchase` WHERE `id` = $id";
if (!mysqli_query($conn, $query)) {
    echo "Error deleting purchase record: " . mysqli_error($conn);
    exit; // Exit script if there's an error
}

?>
<script>
    window.location.assign("Purchase.php");
</script>
