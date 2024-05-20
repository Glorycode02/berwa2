<?php
$conn = mysqli_connect("localhost", "root", "", "berwashop");

$code = $_GET['ProductCode'];


$select = mysqli_query($conn, "SELECT * FROM product WHERE `ProductCode` = $code");
$fetch = mysqli_fetch_assoc($select);

$select2 = mysqli_query($conn, "SELECT * FROM productin WHERE `ProductCode` = $code");
$fetch2 = mysqli_fetch_assoc($select2);

$form = '
<div class="container">
        <form action="" method="POST">
            <h1>Berwa shop</h1>
            <p>Export your products from the store</p>
            <div class="div1">
                <label>Product Id</label>
                <input type="text" placeholder="Product Id" name="pid" value="' . $fetch['ProductCode'] . '" disabled>
            </div>
            <div class="div2">
                <label>Product name</label>
                <input type="text" placeholder="Product name" name="pname" value="' . $fetch['ProductName'] . '" disabled>
            </div>
            <div class="div2">
                <label>Date</label>
                <input type="date" placeholder="Date" name="date">
            </div>
            <div class="div2">
                <label>Quantity</label>
                <input type="text" placeholder="Quantity" name="quant" value="' . $fetch2['Quantity'] . '">
            </div>
            <div class="submit">
                <input type="submit" value="Export product" name="export" class="login">
            </div>
            <div class="link">
                <p><a href="./productout.php">Back to productout</a></p>
            </div>
        </form>
    </div>
';

if (isset($_POST['export'])) {
    $date = $_POST['date'];
    $quantity =$fetch2['Quantity'] - $_POST['quant'];
    $total = $quantity * $unit;

    $export = mysqli_query($conn, "UPDATE productin SET `TotalPrice`= $total,`ProductCode` = $code WHERE `ProductCode` = $code");
    $insert = mysqli_query($conn, "INSERT INTO productout VALUES('$date','$quantity','$total','$code') ");
    if ($export) {
        echo "Exported successfully";
    } else {
        echo "Not exported";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export</title>
    <style>
        body {
            font-family: system-ui;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            text-align: center;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        .div1 {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .submit {
            text-align: center;
            margin-top: 20px;
        }

        .login {
            background-color: dodgerblue;
            width: 100%;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .link {
            text-align: center;
            margin-top: 20px;
        }

        .link a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>

<body>
    <?php echo $form ?>
</body>

</html>