<?php

    require_once '../db.php';
    $id = $_GET["id"];

    $product = mysqli_query($db, "SELECT * FROM `products` WHERE `id` = $id");

    if (mysqli_num_rows($product) === 0) {
        die("Product not found");
    }

    $product = mysqli_fetch_assoc($product);

?>


<form
    action="save.php"
    method="post"
    enctype="multipart/form-data"
        >
    <input type="hidden" name="id" value="<?=$product["id"]?>">
    <input type="hidden" name="img_url" value="<?=$product["image"]?>">
    <p>Title</p>
    <input type="text" name="title" value="<?=$product["title"]?>">
    <p>Descrition</p>
    <textarea name="description"><?=$product["description"]?></textarea>
    <p>Price</p>
    <input type="text" name="price" value="<?=$product["price"]?>">
    <select name="category">
        <option><?=$product["category"]?></option>
        <?php
            $categories = ["Продукты", "Хоз. товары", "Игрушки"];
        foreach ($categories as $category){
                if($category != $product["category"]){
                    echo "<option>" . $category . "</option>>";
                }
            };
        ?>
    </select>
    <p>Product Image</p>
    <img width="150" src=../../<?=$product["image"]?>> <br> <br>
    <input type="file" name="image">
    <br>
    <br>
    <button type="submit">Save</button>
</form>