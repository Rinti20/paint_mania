<?php  include 'includes/connect.php';
include 'folder/common_function.php'; 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <!--bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--bootstrap fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <style>
    body{
  overflow-x: hidden;
    }
  </style>
</head>

<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child is navbar-->
        <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/logo.jpg"  alt="unable to load" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php   cart_item();  ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price(); ?></a>
        </li>
       
      </ul>
      <form class="d-flex" action="search_product.php" method="get" >
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<?php
cart();

?>

<!--2nd child-->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
        
        <?php
          if(!isset($_SESSION['useremail'])){
            echo "<li class='nav-item'>
            <a  class='nav-link' href='#'>Welcome Guest</a>
        </li>";
  
          }
          else{
            echo "<li class='nav-item'>
            <a  class='nav-link' href='#'>Welcome".$_SESSION['useremail']."</a>
        </li>";
            
  
          }
        if(!isset($_SESSION['useremail'])){
          echo "<li class='nav-item'>
          <a  class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";

        }
        else{
          echo "<li class='nav-item'>
          <a  class='nav-link' href='./users_area/logout.php'>Logout</a>
      </li>";
          

        }


        ?>

        
    </ul>
</nav>

<!--3rd child-->
<div class="bg-light">
    <h3 class="text-center">
        Hidden store
    </h3>
    <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
</div>

<!--4th child-->
<div class="row">
   <div class="col-md-10">
        <div class="row p-3">

        <!--fetching products-->
        <?php
        getproducts();
        get_unique_categories();
        get_unique_seller();
        //$ip=getIPAddress() ;
        //echo 'User real IP address---'.$ip;

       /* $stmt="select * from `products` order by rand()";
        $res=mysqli_query($con,$stmt);
        while($row=mysqli_fetch_assoc($res)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
  
          $category_id=$row['category_id'];
          $seller_id=$row['seller_id'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];

          echo "   <div class='col-md-4 mb-2'>
          <div class='card' >
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
             <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
               <p class='card-text'>$product_description</p>
               <a href='#' class='btn btn-info'>Add to cart</a>
               <a href='#' class='btn btn-secondary'>View More</a>
          </div>
        </div>
      </div>";
         

        }*/


        ?>
         

          <!--row end-->
      </div>

      <!--col end-->
      



    <!--products-->
</div>
    <div class="col-md-2 bg-secondary p-0">
         <!--sidenav--->
         <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Sellers</h4></a>
          </li>
          <?php
          getsellers();
         /* $stmt1="select * from `sellers`";
          $res=mysqli_query($con,$stmt1);
         // $row_data=mysqli_fetch_assoc($res);
          //echo $row_data['seller_title'];gives 1st record
          while($row_data=mysqli_fetch_assoc($res)){
            $seller_title=$row_data['seller_title'];
            $seller_id=$row_data['seller_id'];
            echo "<li class='nav-item'>
            <a href='index.php?seller=$seller_id' class='nav-link text-light'>$seller_title</a>
          </li>";

          }*/




          ?>

          
         </ul>


         <!--categories-->
         <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
          </li>
          <?php
          getcategories();
          








          ?>

         </ul>


    </div>

</div>




<!--last child footer-->
<div class="bg-info p-3 text-center">
    <p>All rights reserved</p>
</div>

    </div>
    


<!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>