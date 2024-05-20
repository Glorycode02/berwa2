<?php
$conn = mysqli_connect("localhost", "root", "", "berwashop");

$code = $_GET['ProductCode'];

if (!isset($code)) {
    header("Location: ./products.php");
}

$select = mysqli_query($conn, "SELECT * FROM product WHERE `ProductCode` = '{$code}'");
$fetch = mysqli_fetch_assoc($select);

$form = '
<div class="container">
<form action="" method="POST">
    <h1>Berwa shop </h1>
    <p>Add your products</p>
    <div class="div1">
        <label>Product Code</label>
        <input type="text" name="code" placeholder="ProductCode" value="' . $fetch['ProductCode'] . '" disabled>
    </div>
    <div class="div2">
        <label>Product name</label>
        <input type="text" placeholder="Product name" name="pname" value="' . $fetch['ProductName'] . '">
    </div>

    <div class="submit">
        <input type="submit" value="Update product" name="update" class="login">
    </div>
    <div class="link">
        <p><a href="./products.php">Back to products</a></p>
    </div>
</form>
</div>
';

if (isset($_POST['update'])) {
    $pname = $_POST['pname'];
    $update = mysqli_query($conn, "UPDATE product SET `ProductName` = '{$pname}' WHERE `ProductCode` = $code");
    if ($update) {
        echo "<script>Item updated succesfully</script>";
        header("Location: ./products.php");
    }
} else {
    echo "<script>Item not updated</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        body {
            font-family: system-ui;
        }

        .container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px;
            width: 350px;
            box-shadow: 0px 0px 3px #aaa;
            text-align: center;
        }

        .div1 {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 10px;

        }

        .div1 label {
            font-family: system-ui;
            font-weight: bold;
        }

        .div1 input {
            padding: 10px;
            width: 300px;
            outline: none;
            border-radius: 5px;
            border: 1px solid #aaa;
            font-size: 15px;
        }

        .div2 {
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 10px;

        }

        .div2 label {
            font-family: system-ui;
            font-weight: bold;
        }

        .div2 input {
            border: 1px solid #aaa;
            padding: 10px;
            width: 300px;
            outline: none;
            border-radius: 5px;
            font-size: 15px;
        }

        .login {
            padding: 15px;
            width: 300px;
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
    <?php echo $form ?>
</body>

</html>