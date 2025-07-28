<?php
include('../includes/connect.php');
//getting products 
function get_products()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            // $row = mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description
</p>
  <p class='card-text'>Price: $product_price CHF
</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>


                        </div>
                    </div>
                </div>";



            }
        }
    }
}

// getting unique categories 
function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {

        $category_id = $_GET['category'];


        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description
</p>
 <p class='card-text'>Price: $product_price CHF
</p>
           
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>


                        </div>
                    </div>
                </div>";




        }
    }
}

// getting unique brands 
function get_unique_brands()
{
    global $con;
    if (isset($_GET['brand'])) {

        $brand_id = $_GET['brand'];


        $select_query = "select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
        }
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description
</p>
 <p class='card-text'>Price: $product_price CHF
</p>
           
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>


                        </div>
                    </div>
                </div>";




        }
    }
}



// getting brands sidebar
function get_brands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    //  $row_data = mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title']; 
    // mysqli_fetch_assoc(...) gets one row at a time as an associative array  
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                </li>";
    }
}
// getting categories sidebar
function get_categories()
{
    global $con;
    $select_categories = "select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);


    while ($row_data = mysqli_fetch_assoc($result_categories)) {

        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>   
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>   
                        </li>";


    }
}

// searching products function 

function search_products()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];


        $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description
</p>
 <p class='card-text'>Price: $product_price CHF
</p>
           
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>


                        </div>
                    </div>
                </div>";



        }

    }
}

// view details function 
function view_details()
{
    global $con;
    if (isset($_GET['product_id'])) {


        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];

                $select_query = "select * from `products` where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title'];
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];

                    $product_image3 = $row['product_image3'];

                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description
</p>
 <p class='card-text'>Price: $product_price CHF
</p>
           
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='./index.php' class='btn btn-secondary'>Go home</a>


                        </div>
                    </div>
                </div>
                
                
                <div class='col-md-8'>
                    <!-- related images -->
                    <div class='row'>

                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-5'>Related products</h4>
                                                <div class='row'>

                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>

                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>

                            </div>
                            </div>


                        </div>
                    </div>
                </div>
                ";



                }
            }
        }
    }

}
// get ip function 
function getIPaddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP depuis Internet partagé
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passée par un proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // IP directe
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//$ip = getIPaddress();
//echo 'User Ip address - ' . $ip;
function cart()
{

    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPaddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address='$ip' and product_id='$get_product_id'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already in your cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
            $result_query = mysqli_query($con, query: $insert_query);
            echo "<script>alert('Item added to cart')</script>";

            echo "<script>window.open('index.php','_self')</script>";


        }

    }
}

//funtcion to get cart items number
function cart_item()
{

    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPaddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

    } else {
        global $con;
        $ip = getIPaddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;

}

// total price function 
function total_cart_price()
{
    global $con;
    $ip = getIPaddress();
    $total = 0;
    $cart_query = "select * from `cart_details` where ip_address='$ip'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "select * from `products` where product_id='$product_id'";

        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);    // tableau qui va contenir tout les prix des produits du cart
            $product_values = array_sum($product_price);
            $total += $product_values;

        }


    }
    echo $total;
}
// total price function avec jointures 

/*
function total_cart_price()
{
    global $con;
    $ip = getIPaddress();
    $total = 0;

    $cart_query = "SELECT p.product_price 
                   FROM cart_details c 
                   JOIN products p ON c.product_id = p.product_id 
                   WHERE c.ip_address = '$ip'";

    $result = mysqli_query($con, $cart_query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_assoc($result)) {
        $total += floatval($row['product_price']);
    }

    echo $total;
}

*/

?>