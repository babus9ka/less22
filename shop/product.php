<?php
require_once 'includes/db.php';

$id = $_GET["id"];

$product = mysqli_query($db, "SELECT * FROM `products` WHERE `id` = $id");

if (mysqli_num_rows($product) === 0) {
    die("Product not found");
}


$product = mysqli_fetch_assoc($product);

?>
<img src="<?= $product["image"] ?>" width="300px">
<h1><?= $product["title"] ?></h1>
<p><?= $product["description"] ?></p>
<p><b><?= $product["price"] ?> RUB</b></p>
<a href="index.php">Вернуться на главную</a>
<br>
<br>
<form action="includes/actions/store_comment.php" method="post">
    <p>Имя</p>
    <input type="hidden" name="product_id" value="<?=$product["id"]?>">
    <input type="text" name="name">
    <p>Содержимое</p>
    <textarea name="body"></textarea>
    <br>
    <br>
    <button type="submit">Сохранить отзыв</button>
</form>


<h3>Отзыв о продукте</h3>
<ul>
<?php
    $reviews = mysqli_query($db, "SELECT * FROM `reviews` WHERE `product_id` = $id");

    while ($review = mysqli_fetch_assoc($reviews)){
        ?>
        <li style="text-decoration:none; font-size: 18px; list-style: none  "><b><?=$review['name']?></b></li>
        <?=$review['body']?>
        <br><br>
        <?php

}

?>





</ul>






<?php

?>
