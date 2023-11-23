<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: /');
  exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

if (isset($_POST['create'])) {
  $userid = $_SESSION["user"]["id"];
  $categoryid = $_POST['category'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $file = $_FILES['image'];
  $endDate = isset($_POST["auction"]) ? $_POST['endDate'] : null;
  $standardDelivery = isset($_POST["standardDelivery"]);
  $expressDelivery = isset($_POST["expressDelivery"]);
  $pickUp = isset($_POST["pickUp"]);

  $insertData = addProduct(
    $userid,
    $categoryid,
    $title,
    $description,
    $price,
    $file,
    $endDate,
    $standardDelivery,
    $expressDelivery,
    $pickUp
  );
}

header('Location: /');
exit();

function addProduct(
  $userid,
  $categoryid,
  $name,
  $description,
  $price,
  $file,
  $endDate,
  $standardDelivery,
  $expressDelivery,
  $pickUp
) {
  $query = 'INSERT INTO products (userid, categoryid, name, description, price, imageUrl, endDate, supportStandard, supportExpress, supportPickup)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

  $imageName = $file['name'];
  $imageTmpName = $file['tmp_name'];

  $targetDir = PUBLIC_R . "/images/";
  $baseImageName = basename($imageName, ".jpg") . '--userid-' . $userid . ".jpg";
  $targetFile = $targetDir . $baseImageName;
  move_uploaded_file($imageTmpName, $targetFile);
  // Before the insert query
  $insertData = insert(
    $query,
    ['type' => 'i', 'value' => $userid],
    ['type' => 'i', 'value' => $categoryid],
    ['type' => 's', 'value' => $name],
    ['type' => 's', 'value' => $description],
    ['type' => 'd', 'value' => $price],
    ['type' => 's', 'value' => $baseImageName],
    ['type' => 's', 'value' => $endDate],
    ['type' => 'i', 'value' => $standardDelivery],
    ['type' => 'i', 'value' => $expressDelivery],
    ['type' => 'i', 'value' => $pickUp],
  );

  return $insertData;
}
