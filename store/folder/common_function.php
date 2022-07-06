<?php

//include './includes/connect.php';
//getting products


function getproducts(){
    global $con;
    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['seller'])){
    $stmt="select * from `products` order by rand()";
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
               <p class='card-text'>Price:$product_price</p>
               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
               <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
          </div>
        </div>
      </div>";
         

        }
    }
}

}
function get_all_products(){

    global $con;
    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['seller'])){
    $stmt="select * from `products` order by rand()";
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
               <p class='card-text'>Price:$product_price</p>
               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
               <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
          </div>
        </div>
      </div>";
         

        }
    }
}

}
//getting unique categories

function get_unique_categories(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        
    $stmt="select * from `products` where category_id=$category_id";
        $res=mysqli_query($con,$stmt);
        $r=mysqli_num_rows($res);
        if($r==0){
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
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
               <p class='card-text'>Price:$product_price</p>
               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
               <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
          </div>
        </div>
      </div>";
         

        
    }
}

}


//getting unique sellers
function get_unique_seller(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['seller'])){
        $seller_id=$_GET['seller'];
        
    $stmt="select * from `products` where seller_id=$seller_id";
        $res=mysqli_query($con,$stmt);
        $r=mysqli_num_rows($res);
        if($r==0){
            echo "<h2 class='text-center text-danger'>No seller available</h2>";
        }
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
               <p class='card-text'>$product_description</p><a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
               <p class='card-text'>Price:$product_price</p>
               <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
          </div>
        </div>
      </div>";
         

        
    }
}

}

//displaying sellers

function getsellers(){
    global $con;
    $stmt1="select * from `sellers`";
    $res=mysqli_query($con,$stmt1);
   // $row_data=mysqli_fetch_assoc($res);
    //echo $row_data['seller_title'];gives 1st record
    while($row_data=mysqli_fetch_assoc($res)){
      $seller_title=$row_data['seller_title'];
      $seller_id=$row_data['seller_id'];
      echo "<li class='nav-item'>
      <a href='index.php?seller=$seller_id' class='nav-link text-light'>$seller_title</a>
    </li>";

    }
}

function getcategories(){
    global $con;
    $stmt2="select * from `categories`";
          $res2=mysqli_query($con,$stmt2);
          while($row_data=mysqli_fetch_assoc($res2)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "<li class='nav-item '>
            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
          </li>";
          }
}





//get searching products

function search_product(){
    

    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_val=$_GET['search_data'];
    
    $stmt="select * from `products` where product_keywords like '%$search_data_val%'";
        $res=mysqli_query($con,$stmt);
        $r=mysqli_num_rows($res);
        if($r==0){
            echo "<h2 class='text-center text-danger'>Oops not found</h2>";
        }
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
               <p class='card-text'>Price:$product_price</p>
               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
               <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
          </div>
        </div>
      </div>";
         

        }
    }


}

//view details

function view_details(){
  global $con;
  //condition to check isset or not
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
      if(!isset($_GET['seller'])){
        $product_id=$_GET['product_id'];
  $stmt="select * from `products` where product_id=$product_id";
      $res=mysqli_query($con,$stmt);
      while($row=mysqli_fetch_assoc($res)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];

        $category_id=$row['category_id'];
        $seller_id=$row['seller_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];

        echo "   <div class='col-md-4 mb-2'>
        <div class='card' >
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
           <div class='card-body'>
             <h5 class='card-title'>$product_title</h5>
             <p class='card-text'>$product_description</p>
             <p class='card-text'>Price:$product_price</p>
             <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
             <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
        </div>
      </div>
    </div>";

    echo "<div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>Related products</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='...'>

                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='...'>
                        
                    </div>
                </div>
                
            </div>";
       

      }
  }
}
  }

}


//get IP address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  


//cart function

function cart(){

 
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $stmt="select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
    $res=mysqli_query($con,$stmt);
    $rows=mysqli_num_rows($res);
    if($rows>0){
      echo "<script>alert('Item already present in the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
  }
  else{
    $stmt1="insert into `cart_details`(product_id,ip_address,quantity)values($get_product_id,'$ip',0)";
    $res1=mysqli_query($con,$stmt1);
    echo "<script>alert('Item added to cart successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }

  }

}

//function to get cart items no.
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip=getIPAddress();
    
    $stmt="select * from `cart_details` where ip_address='$ip'";
    $res=mysqli_query($con,$stmt);
    $count_cart_items=mysqli_num_rows($res);
  }
  else{
    global $con;
    $ip=getIPAddress();
    
    $stmt="select * from `cart_details` where ip_address='$ip'";
    $res=mysqli_query($con,$stmt);
    $count_cart_items=mysqli_num_rows($res);
    
  }

  echo $count_cart_items;

  }

//total price function
function total_cart_price(){
  global $con;
  $ip=getIPAddress();
  $tot=0;
  $cart_query="select * from `cart_details` where ip_address='$ip'";
  $res=mysqli_query($con,$cart_query);
  while($rows=mysqli_fetch_array($res)){
    $product_id=$rows['product_id'];
    $select_products="select * from `products` where product_id='$product_id'";
    $result=mysqli_query($con,$select_products);
    while($row=mysqli_fetch_array($result)){
      $product_price=array($row['product_price']);//[200,300]
      $product_values=array_sum($product_price);//[500]
$tot+=$product_values;

    }



}
echo $tot;

}


?>