<?php
    require_once "../db.php";


    $name = $_POST['name'];
    $body = $_POST['body'];
    $product_id = $_POST['product_id'];


    $query = mysqli_query($db, "INSERT INTO `reviews` (`id`, `name`, `body`, `product_id`)
            VALUES (NULL, '$name', '$body', '$product_id')");

    ?>

    <a href="../../product.php?id=<?=$product_id ?>">Вернуться к продукту</a><br><br>

<?php
    die($query ? "Comment is added" : "Error add new comment" );



