<?php

require('../DatabaseConn.php');

$cat_id = $_GET["cat_id"];

$select = "SELECT id, color FROM `companyproduct` WHERE cate_id = $cat_id";
$result = mysqli_query($conn, $select);

$response = ['colors' => ''];

if ($result) {
    $colors = [];

    while ($row = mysqli_fetch_array($result)) {
        $colors[] = '<option value="'.$row["id"].'">'.$row['color'].'</option>';
    }

    $response['colors'] = '<option value="">Select color</option>' . implode('', $colors);
    echo json_encode($response);
} else {
    echo json_encode(['colors' => '<option value="">No results</option>']);
}
?>
