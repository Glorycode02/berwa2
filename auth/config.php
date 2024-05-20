<?php
$conn = mysqli_connect("localhost", "root", "", "berwashop");

if (!$_SESSION['ShopkeeperId']) {
    header("Location: ./login.php");
}