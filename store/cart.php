<?php  include 'includes/connect.php';
include 'folder/common_function.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
    <!--bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--bootstrap fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <style>

        .cart_img{
            height:80px;
            width:80px;
            object-fit:contain;
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
        
       
      </ul>
      
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
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
          
            <tbody>
                <!--php code-->
                <?php
               
                $ip=getIPAddress();
                $total_price=0;
                $cart_query="select * from `cart_details` where ip_address='$ip'";
                $res=mysqli_query($con,$cart_query);
                $res_count=mysqli_num_rows($res);
                if($res_count==0)echo "<h4 class='text-danger text-center'>Cart is empty</h4>";
               else if($res_count>0){
                    echo "
                    <thead>
                    <tr>
                        <th>Product title</th>
                        <th>Product image</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>";
                while($rows=mysqli_fetch_array($res)){
                  $product_id=$rows['product_id'];
                  $select_products="select * from `products` where product_id='$product_id'";
                  $result=mysqli_query($con,$select_products);
                  while($row=mysqli_fetch_array($result)){
                    $product_price=array($row['product_price']);//[200,300]
                    $price_table=$row['product_price'];
                    $product_title=$row['product_title'];
                    $product_image1=$row['product_image1'];
                    
                    $product_values=array_sum($product_price);//[500]
              $total_price+=$product_values;
              

              
?>
 <tr>
              <td><?php echo $product_title ?></td>
              <td><img  class='cart_img' src='./admin_area/product_images/<?php echo $product_image1?>' alt=''></td>
              <td><input type='text' name='quantity'class='form-input w-50'></td>
              <?php
              $ip=getIPAddress();
              if(isset($_POST['update_cart'])){
                $quantities=$_POST['quantity'];
                $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                $results=mysqli_query($con,$update_cart);
                $total_price=$total_price * $quantities;
                
              }




             ?>
              <td><?php echo  $price_table ?></td>
              <td><input type='checkbox' name="item[]"value="<?php 
              echo $product_id;  ?>"></td>
              <td>
                  <!--<button class='bg-info px-3 py-2 border-0 mx-3'>Update</button>-->
                  <input type="submit" value='Update Cart' class='bg-info px-3 py-2 border-0 mx-3' name="update_cart">
                  <input type="submit" value='Remove  item' class='bg-info px-3 py-2 border-0 mx-3' name="remove_cart">
                  
                  
              </td>
          </tr>
          <?php }}}?>
              
                </tbody>
                </table>
                <div class='d-flex mb-5'>
                    <?php
                     $ip=getIPAddress();
                   
                     $cart_query="select * from `cart_details` where ip_address='$ip'";
                     $res=mysqli_query($con,$cart_query);
                     $res_count=mysqli_num_rows($res);
                     if($res_count>0){
                        echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price  </strong></h4>
                        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                        <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                     }
                     else{
                        
                        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                     }
                     if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('index.php','_self')</script>";
                     }



                    ?>
                    
                </div>







                

               
        
    </div>
</div>
</form>

<!--function to remove items-->

<?php

function remove_cart_item(){
    global $con;
    
                  
                  if(isset($_POST['remove_cart'])){
                    foreach($_POST['item'] as $remove_id){
                        echo $remove_id;
                        $del_query="delete from `cart_details` where product_id=$remove_id";
                        $res_del=mysqli_query($con,$del_query);
                        if($res_del){
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                    

                  }


                   
}
echo $remove_item=remove_cart_item();





?>


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