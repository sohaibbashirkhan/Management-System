<?php

require('../DatabaseConn.php');

$product_id = $_GET["product_id"];

$select = "SELECT title, pack FROM `companyproduct` WHERE id = $product_id";
$result = mysqli_query($conn, $select);

$response = ['titles' => '', 'packs' => ''];

if ($result) {
    $row = mysqli_fetch_array($result);

    $titles = '<option value="'.$row["title"].'">'.$row['title'].'</option>';
    $packs = '<option value="'.$row["pack"].'">'.$row['pack'].'</option>';

    $response['titles'] = '<option value="">Select title</option>' . $titles;
    $response['packs'] = '<option value="">Select Pack</option>' . $packs;

    echo json_encode($response);
} else {
    echo json_encode(['titles' => '<option value="">No results</option>', 'packs' => '<option value="">No results</option>']);
}
?>
