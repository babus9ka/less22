<?php
$db = mysqli_connect('localhost',
    'root',
    'root',
    'shop');

if (!$db){
    die('Error connect to shop');
}
