<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="../style.css">


</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first-child -->

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="makaynchlogo" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>

                </nav>
            </div>

        </nav>
        <!-- second-child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage details</h3>
        </div>
        <!-- third-child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="col-md-2">
                    <a href=""><img src="../images/img2.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <!-- pour creer 10 bouttons ==> button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center col-md-10">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert
                            Products</a></button>
                    <button><a href="view_products.php" class="nav-link text-light bg-info my-1">View Products</a>
                    </button><button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert
                            Categories</a>
                    </button><button><a href="view_categories.php" class="nav-link text-light bg-info my-1">View
                            Categories</a>
                    </button><button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert
                            Brands</a>
                    </button><button><a href="view_brands.php" class="nav-link text-light bg-info my-1">View Brands</a>
                    </button><button><a href="all_orders.php" class="nav-link text-light bg-info my-1">All Orders</a>
                    </button><button><a href="all_payments.php" class="nav-link text-light bg-info my-1">All
                            Payments</a>
                    </button><button><a href="list_users.php" class="nav-link text-light bg-info my-1">List Users</a>
                    </button><button><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a>
                    </button>

                </div>
            </div>
        </div>

    </div>

    <!-- fourth-child -->
    <div class="container my-4">
        <?PHP
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }
        ?>
    </div>



    <!-- last-child -->
    <?php include('./includes/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>