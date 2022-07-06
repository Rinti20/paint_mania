<?php   include '../includes/connect.php';  
include '../folder/common_function.php';
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>User login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--bootstrap fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x:hidden;

        }
    </style>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">User login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5 ">
            <div class="lg-12 col-xl-6">
                <form action="" method="post">
                <div class="form-outline mb-4">
                        <label for="useremail" class="form-label">Useremail</label>
                        <input type="email" id="useremail" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="useremail">
                    </div>


                    
                    <div class="form-outline mb-4">
                        <label for="userpassword" class="form-label">Userpassword</label>
                        <input type="password" id="userpassword" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="userpassword">
                    </div>

                
                   <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="userlogin">
                    <p class="small fw-bold mt-2 pt-1 ">Don't have an account?<a href="user_registration.php" class="text-danger">Register</a></p>
                   </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
if(isset($_POST['userlogin'])){
   
    $useremail=$_POST['useremail'];
    $password=$_POST['userpassword'];
    $select_query="select * from `user_table` where user_email='$useremail' ";
    $res=mysqli_query($con,$select_query);
    $row=mysqli_num_rows($res);
    $row_data=mysqli_fetch_assoc($res);
    $user_ip=getIPAddress();

    $sel_query="select * from `cart_details` where ip_address='$user_ip' ";
    $r=mysqli_query($con,$sel_query);
    $row_cart=mysqli_num_rows($r);
    




    if($row>0){
        $_SESSION['useremail']=$useremail;
        if(password_verify($password,$row_data['user_password'])){
            //echo "<script>alert('Logged in successfully')</script>";
            if($row==1 and $row_cart==0)//log in but no items in cart
            {
                $_SESSION['useremail']=$useremail;
            echo "<script>alert('Logged in successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";

        }
        else{
            $_SESSION['useremail']=$useremail;
            echo "<script>alert('Logged in successfully')</script>";
            echo "<script>window.open('payment.php','_self')</script>";

        }
    }
    else{
        echo "<script>alert('Invalid credentials')</script>";
    }
    }
        else{
            echo "<script>alert('Invalid credentials')</script>";
        }
    }
   
        
        



?>