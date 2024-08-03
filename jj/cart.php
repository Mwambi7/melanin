<?php
session_start();

require_once('config.php');

// Initialize total variable
$total = 0;

if (isset($_POST["addc"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'id' => $_GET["id"],
                'productname' => $_POST["hidden_name"],
                'price' => $_POST["hidden_price"],
                'quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="welcomef.php"</script>';
        } else {
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="welcomef.php"</script>';
        }
    } else {
        $item_array = array(
            'id' => $_GET["id"],
            'productname' => $_POST["hidden_name"],
            'price' => $_POST["hidden_price"],
            'quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        .product {
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }

        table,
        th,
        tr {
            text-align: center;
        }

        .title2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        h2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #efefef;
        }
    </style>
    <link href="form-validation.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cart</title>
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Melanin Checkout</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <a href="welcomef.php" class="btn btn-success">Continue Shopping</a>
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Product Name</th>
                                <th width="10%">Quantity</th>
                                <th width="13%">Price Details</th>
                                <th width="10%">Total Price</th>
                                <th width="17%">Remove Item</th>
                            </tr>

                            <?php
                            if (!empty($_SESSION["cart"])) {
                                foreach ($_SESSION["cart"] as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value["productname"]; ?></td>
                                        <td><?php echo $value["quantity"]; ?></td>
                                        <td>Ksh <?php echo $value["price"]; ?></td>
                                        <td>Ksh <?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
                                        <td><a href="cart.php?action=delete&id=<?php echo $value["id"]; ?>"><span class="btn btn-danger">Remove Item</span></a></td>
                                    </tr>
                            <?php
                                    // Calculate total price
                                    $total += $value["quantity"] * $value["price"];
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Total</td>
                                <th align="right">Ksh <?php echo number_format($total, 2); ?></th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form action="payments.php" method="post">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" name="FName" placeholder="" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="LName" placeholder="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo ($_SESSION["username"]); ?>" readonly required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" name="email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 </label>
                                <input type="text" class="form-control" name="addressT" placeholder="Apartment or suite" required>
                            </div>
                            <div class="col-12">
                                <label for="amount" class="form-label">Amount to be paid</label>
                                <!-- Display the total amount as a placeholder -->
                                <input type="number" class="form-control" name="amount_display" placeholder="Ksh <?php echo number_format($total, 2); ?>" readonly>
                                <!-- Hidden input field to hold the actual amount value -->
                                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                            </div>
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone number</label>
                                    <input type="number" class="form-control" name="phone" required>
                                    <small class="text-muted">Enter phone number</small>
                                    <div class="invalid-feedback">
                                        Phone number required
                                    </div>
                                </div>
                            </div>
                            <button class="w-100 btn btn-dark btn-lg" name="checkout" type="submit">Checkout</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; Melanin 2024</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
