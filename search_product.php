<?php
include("includes/connect.php");
include("functions/common_functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce PHP MYSQL 25-06_11h45</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total price: <?php total_cart_price() ?> CHF</a>
                    </li>
                </ul>

                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search_data">
                    <!--  <button class="btn btn-outline-light" type="submit">Search</button>   -->

                    <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">

                </form>
            </div>
        </div>
    </nav>
    <!-- second-child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome guest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./users_area/user_login.php">Login</a>
            </li>
        </ul>
    </nav>

    <!-- third-child -->
    <div class="bg-light"></div>
    <h3 class="text-center">Hidden store</h3>
    <p class="text-center">Communicatios is at the heart of e-commerce and community</p>

    <!-- fourth-child -->
    <div class="row px-3">
        <!-- fetch & display products -->

        <!-- main content (products) -->
        <div class="col-md-10">
            <div class="row">
                <?php
                search_products();
                get_unique_categories();
                get_unique_brands();

                ?>


            </div> <!-- row-end -->
        </div>

        <!-- sidebar -->
        <div class="col-md-2 bg-secondary p-0">
            <!-- brands to be displayed -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light">
                        <h4>Brands</h4>
                    </a>
                </li>
                <?php
                get_brands();

                ?>

            </ul>
            <!-- cateories to be displayed -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light">
                        <h4>Categories</h4>
                    </a>
                </li>

                <?php
                get_categories()
                    ?>

                </li>
            </ul>
        </div>
    </div>






    <!-- last-child -->
    <?php include('./includes/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>