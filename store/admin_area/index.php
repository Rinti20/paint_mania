<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">

    <style>
        .admin_image{
            margin-left:5px;
            width:100px;
            object-fit: contain;
}
.footer{
    position:absolute;
    bottom:0;
}

</style>
</head>
<body>
 <!--navbar-->
 <div class="container-fluid p-0">
 <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/logo.jpg"  alt="" class="logo">
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="#" class="nav-link">Welcome Guest</a></li>
        </ul>
</nav>
        </div>
    </nav>

    <!--2nd child-->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!--3rd child-->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5">
                <a href="#"><img src="../images/card1.jpg" alt="" class="admin_image"></a>
                <p class="text-light text-center">
                    Admin Name
                </p>
            </div>
            <div class="button text-center px-5 mx-5 border-0 ">
                <button class="my-3  border-0"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button class="my-3 border-0"><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button  class="my-3 border-0"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button class="my-3 border-0"><a href="view_categories.php" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button class="my-3 border-0"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Sellers</a></button>
                <button class="my-3 border-0"><a href="view_sellers.php" class="nav-link text-light bg-info my-1">View Sellers</a></button>
                <button class="my-3 border-0"><a href="../cart.php" class="nav-link text-light bg-info my-1">All orders</a></button>
                <button class="my-3 border-0"><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                <button class="my-3 border-0"><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
                <button class="my-3 border-0"><a href="../users_area/logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                
            </div>

        </div>
    </div>
 

    <!--4th child-->

    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include 'insert_categories.php';
        }
        if(isset($_GET['insert_brand'])){
            include 'insert_brands.php';
        }
        ?>
    </div>
 <div class="bg-info p-3 text-center footer">
    <p>All rights reserved</p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>