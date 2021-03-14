<?php
    require_once '../db.php';

$path = "uploads/" . time() . "_" . $_FILES["image"]["name"];
if (move_uploaded_file($_FILES["image"]["tmp_name"], "../../" .  $path)) {

    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    $query = mysqli_query($db, "INSERT INTO `products` (`id`, `title`, `description`, `price`,
                        `category`, `image`) VALUES (NULL, '$title', '$description',
                                                     '$price', '$category', '$path')");
    echo ($query) ? "Product is store" : "Error store product";


}
?>
<br>
<br>
<a href="../../index.php">Вернуться на Главную</a>
