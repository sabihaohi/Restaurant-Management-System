<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>


    <div class="fullnav">
        <div>
            <img class="logo" src="../images/logo.png" alt="" width="100px" height="100px">
        </div>

        <div class="navdesign">
            <li><a href="home_view.php">Home</a></li>
            <li><a href="profile_view.php">Profile</a></li>
            <li><a href="change_password_view.php">Change Password</a></li>

            <div class="dropdown">
                <p class="dropbtn">Food Items</p>
                <div class="dropdown-content">
                    <li><a href="add_food_item_view.php">Add Food Item</a></li>
                    <li><a href="food_items_view.php">View Food Items</a></li>
                </div>
            </div>
            <div class="dropdown">
                <p class="dropbtn">Coupons</p>
                <div class="dropdown-content">
                    <li><a href="add_coupon_view.php">Add Coupons</a></li>
                    <li><a href="coupons_view.php">View Coupons</a></li>
                </div>
            </div>



            <li><a class="oh" href="order_history_view.php">Order History</a></li>
            <li><a href="sales_report_view.php">View Sales Report</a></li>
            <li><a href="../controllers/logout_controller.php">Logout</a></li>
        </div>

    </div>




</body>

</html>