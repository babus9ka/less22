<?php

require_once '../db.php';
$id = $_POST["id"];

   $query = mysqli_query($db, "DELETE FROM `products` WHERE `products`.`id` = $id")

?>
<br>
<a href="/">Вернуться на главную</a><br><br>
<?php
die($query ? 'Продукт успешно удален' : 'Ошибка, продукт не был удален');
?>

