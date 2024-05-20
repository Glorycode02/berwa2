<?php
$conn = mysqli_connect("localhost", "root", "", "berwashop");

session_start();


if (isset($_POST['add'])) {
    $pname = $_POST['pname'];

    $insert = mysqli_query($conn, "INSERT INTO product VALUES('','$pname')");
    if ($insert) {
        echo "Product inserted successfully";
    } else {
        echo "Product not inserted";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="./css/addproduct.css">
    <style>
        .login {
            padding: 15px;
            width: 320px;
            font-weight: bold;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background: green;
        }

        .submit {
            display: flex;
            align-items: start;
        }

        .link a {
            text-decoration: none;
            color: green;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Berwa shop </h1>
            <p>Add your products</p>
            <div class="div1">
                <label>Product name</label>
                <input type="text" placeholder="Product name" name="pname">
            </div>

            <div class="submit">
                <input type="submit" value="Add product" name='add' class="login">
            </div>
            <div class="link">
                <p><a href="./products.php">Back to products</a></p>
            </div>
        </form>
    </div>
</body>

</html>