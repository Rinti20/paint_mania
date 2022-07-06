<?php   include '../includes/connect.php';  
include '../folder/common_function.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>User registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--bootstrap fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">New user registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter username" autocomplete="off" required="required" name="username">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="useremail" class="form-label">Useremail</label>
                        <input type="email" id="useremail" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="useremail">
                    </div>

                    
                    <div class="form-outline mb-4">
                        <label for="userpassword" class="form-label">Userpassword</label>
                        <input type="password" id="userpassword" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="userpassword">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="cpassword" class="form-label">Confirm password</label>
                        <input type="password" id="cpassword" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="cpassword">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="useraddress" class="form-label">User address</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="useraddress">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="usercontact" class="form-label">Usercontact</label>
                        <input type="text" id="usercontact" class="form-control" placeholder="Enter your contact no." autocomplete="off" required="required" name="usercontact">
                    </div>
                   <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="userregister">
                    <p class="small fw-bold mt-2 pt-1 ">Already have an account?<a href="user_login.php" class="text-danger">Login</a></p>
                   </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<!--php code for submitting form into db-->
<?php
if(isset($_POST['userregister'])){
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $userpassword=$_POST['userpassword'];
    $hash_pass=password_hash($userpassword,PASSWORD_DEFAULT);
    $cpassword=$_POST['cpassword'];
    $useraddress=$_POST['useraddress'];
    $usercontact=$_POST['usercontact'];
    $user_ip=getIPAddress();
    $sel_query="select * from `user_table` where user_email='$useremail'";
    $result=mysqli_query($con,$sel_query);
    $rows=mysqli_num_rows($result);
    if($rows>0)echo "<script>alert('User email already exists')</script>";
    else if($userpassword!=$cpassword)echo "<script>alert('Password does not match')</script>";
    //inserting into db
    else{

    $stmt="insert into `user_table`(username,user_email,user_password,user_ip,user_address,user_mobile)values('$username','$useremail','$hash_pass','$user_ip','$useraddress','$usercontact')";
    $res=mysqli_query($con,$stmt);
    if($res){
        echo "<script>alert('Data inserted successfully')</script>";
    }
    else{
        die(mysqli_error($con));
    }
}
//selecting cart items
$sel_cart="select * from `cart_details` where ip_address='$user_ip'";
$results=mysqli_query($con,$sel_cart);
$row_res=mysqli_num_rows($results);
if($row_res>0){
    $_SESSION['username']=$username;
    echo "<script>alert('You have items in cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}
else{
    echo "<script>window.open('../index.php','_self')</script>";
}
}


?>