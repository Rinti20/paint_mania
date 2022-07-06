<?php
  include '../includes/connect.php';
  $stmt1="select * from `categories`";
  $res=mysqli_query($con,$stmt1);
  
  
  while($row_data=mysqli_fetch_assoc($res)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo "<li class='nav-item text-center text-info'>
    $category_title
  </li>";

  }






?>