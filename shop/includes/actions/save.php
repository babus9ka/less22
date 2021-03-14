<?php
    require_once '../db.php';
    $new_image = false;
    $path ="";


if ($_FILES["image"]["name"]) {
    $new_image = true;

    $path = "../../uploads/" . time() . "_" . $_FILES["image"]["name"];

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $path)){
        die('Проблемы с загрузкой картинки');
    }
}
    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];



    if (!$new_image){
        $path = $_POST["img_url"];
    }


    $query = mysqli_query($db, "UPDATE `products` SET 
                            `title` = '$title',
                            `description` = '$description',
                            `price` = '$price',
                            `category` = '$category', 
                            `image` = '$path'
                            WHERE `products`.`id` = $id");


    echo $query ? "Product is update" : "Error update product";4
?>
<br><a href="../../index.php"><b>Вернуться на Главную</b></a>

