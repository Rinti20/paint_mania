<?php   include '../includes/connect.php'; 
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_sellers=$_POST['product_sellers'];
    
    $product_price=$_POST['product_price'];
    $product_status='true';
    

    //images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];


    //accessing image tmp name

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $description=='' or $product_keywords=='' or $product_categories=='' or $product_sellers=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' ){
        echo "<script>alert('Plz fill all the available fields')</script>";
        exit();
    }
    else{
        //moving images seperately to 1 folder
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert product

        $stmt="insert into `products`(product_title,product_description,product_keywords,category_id,seller_id,product_image1,product_image2,product_image3,product_price,date,status)values('$product_title','$description','$product_keywords','$product_categories','$product_sellers','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $res=mysqli_query($con,$stmt);
        if($res){
            echo "<script>alert('Successfully inserted the products')</script>";

        }
    }



}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select a Category</option>

                    <?php

                    $stmt="select * from `categories`";
                    $res=mysqli_query($con,$stmt);
                    while($row=mysqli_fetch_assoc($res)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];

                        echo "<option value='$category_id'>$category_title</option>";
                    }








                   ?>
                    
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_sellers" id="" class="form-select">
                    <option value="">Select a Seller</option>
                    <?php

                    $stmt="select * from `sellers`";
                    $res=mysqli_query($con,$stmt);
                    while($row=mysqli_fetch_assoc($res)){
                    $seller_title=$row['seller_title'];
                    $seller_id=$row['seller_id'];

                    echo "<option value='$seller_id'>$seller_title</option>";
}








?>
                </select>
            </div>

            <!--images-->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>


            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!--price-->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>


            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="insert_product" class="btn btn-primary mb-3 px-3" value="Insert Products">
            </div>



           
        </form>
    </div>
    



</body>
</html>