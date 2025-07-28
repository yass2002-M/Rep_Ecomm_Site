<?php

include("includes/connect.php");
include("functions/common_functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- first-child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="images/logo.jpg" alt="logo-makayench" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i
                                class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
                    </li>

                </ul>


            </div>
        </div>
    </nav>
    <?php
    // cart function
    cart() ?>
    <!-- second-child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome guest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users_area/user_login.php">Login</a>
            </li>
        </ul>
    </nav>

    <!-- third-child -->
    <div class="bg-light"></div>
    <h3 class="text-center">Hidden store</h3>
    <p class="text-center">Communicatios is at the heart of e-commerce and community</p>
    <!-- fourth-child -->
    <div class="container">

        <div class="row">
            <form action="" method="post">

                <table class="table table-bordered text-center">

                    <!-- php displaying cart data-->
                    <?php
                    $ip = getIPaddress();
                    $total = 0;
                    $cart_query = "select * from `cart_details` where ip_address='$ip'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo " <thead>
                        <tr>
                            <th>Product title</th>
                            <th>Product image</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>";


                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "select * from `products` where product_id='$product_id'";

                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];


                                $product_values = array_sum($product_price);
                                $total += $product_values;


                                ?>
                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="orange-image"
                                            class="cart_products_img"></td>
                                    <td><input type="text" name="qty" class="form-input w-50"></td>
                                    <?php $ip = getIPaddress();

                                    if (isset($_POST['update_cart'])) {
                                        $quantities = $_POST['qty'];
                                        $update_cart_quantities = "update `cart_details`set quantity=$quantities where ip_address='$ip'";
                                        $result_cart = mysqli_query($con, $update_cart_quantities);
                                        $total = $total * $quantities;
                                    }
                                    ?>
                                    <td><?php echo $price_table ?> CHF</td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                    <td>
                                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                            name="update_cart">
                                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                            name="remove_cart">
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                    ?>
                    </tbody>


                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <?php
                    global $con;
                    $ip = getIPaddress();
                    $cart_query = "select * from `cart_details` where ip_address='$ip'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo " <h4 class='px-3'>Subtotal:<strong class='text-info'> $total CHF</strong></h4>
                                            <input type='submit' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>


                    <a href='users_area/checkout.php' class='bg-secondary p-3 py-2 border-0 text-light text-decoration-none d-inline-block'>Checkout</a>";
                    } else {
                        echo "<input type='submit' value='Continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    ?>

                </div>


        </div>
    </div>
    </form>
    <!-- function for removing items -->
    <?php
    function remove_cart_items()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php,'_self')</script>";
                }

            }
        }
    }
    echo $remove_item = remove_cart_items();
    ?>





    <!-- last-child -->
    <?php include('./includes/footer.php') ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>