<?php
    require_once 'includes/db.php';
    $products = mysqli_query($db, "SELECT * FROM `products`");

//    while ($product = mysqli_fetch_assoc($products)){
//
//    }




?>

<table>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>title</th>
        <th>price</th>
        <th>category</th>
    </tr>
<?php
    while ($product = mysqli_fetch_assoc($products)){


        ?>
        <tr>
            <td><?= $product["id"] ?></td>
            <td><img src="<?= $product['image'] ?>" width="100px"></td>
            <td><?= $product['title'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['category'] ?></td>
            <td>
                <a href="product.php?id=<?= $product["id"] ?>">View</a>
                <br>
                <a href="includes/actions/product_edit.php?id=<?=$product['id']?>">Edit</a>
                <br>
                <a href="includes/actions/poduct_remove_confirm.php?id=<?=$product['id']?>">Delete</a>
            </td>
        </tr>


       <?php
    }
?>


</table>

<style>
    th, td {
        padding: 10px;
        
    }
    th{
        background: #2e2e2e;
        color: #fff;
    }
    td{
        background: #e3e3e3;
    }
</style>





<form
    action="/includes/actions/store.php"
    method= "post"
    enctype= "multipart/form-data"
    <p>Title</p>
    <input type="text" name="title">
    <p>Descrition</p>
    <textarea name="description"></textarea>
    <p>Price</p>
    <input type="text" name="price">
    <select name="category">
        <option>Игрушки</option>
        <option>Хоз. товары</option>
        <option>Продукты</option>
    </select>
    <p>Product Image</p>
    <input type="file" name="image">
    <br>
    <br>
    <button type="submit">Add new product</button>
    </form>