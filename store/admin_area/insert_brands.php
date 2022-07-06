<?php  include '../includes/connect.php';
if(isset($_POST['insert_seller'])){
    $seller_title=$_POST['seller_title'];
    $select_query="select * from `sellers` where seller_title='$seller_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Seller has already been inserted')</script>";
    }






else{



    $sql="insert into `sellers`(seller_title)values('$seller_title')";
    $res=mysqli_query($con,$sql);
    if($res)echo "<script>alert('Seller has been inserted successfully')</script>";
}
} 
?>
<h2 class="text-center">Insert Sellers</h2>
<form action="" method="post" class="mb-2">
    
    <div class="input-group mb-2 w-90">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="seller_title" placeholder="Insert Sellers" aria-label="sellers" aria-describedby="basic-addon1">
</div>
    
<div class="input-group w-10 mb-2 m-auto">
 
  <input type="submit" class=" bg-info my-3 border-0 p-2" name="insert_seller" value="Insert Sellers">
  
</div>
   


</form>