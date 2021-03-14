<?php

require_once '../db.php';
$id = $_GET["id"];

$product = mysqli_query($db, "SELECT * FROM `products` WHERE `id` = $id");

if (mysqli_num_rows($product) === 0) {
    die("Product not found");
}

$product = mysqli_fetch_assoc($product);

?>




<form action="product_remove.php" method="post">
    <img src="../../<?=$product['image'] ?>" width="200">
    <h3>Вый дествительно хотите удалить этот продукт - <?=$product['title'] ?></h3>
    <input type="hidden" name="id" value="<?=$product['id'] ?>">
    <button type="submit">Agree</button>
</form>
<a href="/">Вернуться назад</a>
