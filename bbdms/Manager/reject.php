<?php
include('includes/config.php');
if(isset($_GET['reject'])){
    $BloodBagno = $_GET['reject'];
    $query = "update request set status='Sorry your order has been rejected' where Order_id = {$BloodBagno}" ;
    $result = mysqli_query($conn,$query);
//echo "<script>alert('Invalid Details');</script>";
 header("Location: ../Manager/status.php");
}?>		

    
