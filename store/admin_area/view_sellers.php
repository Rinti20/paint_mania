<?php
  include '../includes/connect.php';
  $stmt1="select * from `sellers`";
  $res=mysqli_query($con,$stmt1);
  
  
  while($row_data=mysqli_fetch_assoc($res)){
    $category_title=$row_data['seller_title'];
   
    echo "<li class='nav-item '>
    $category_title
  </li>";

  }






?>