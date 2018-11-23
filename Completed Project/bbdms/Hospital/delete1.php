<?php
include('includes/config.php');
if(isset($_GET['delete'])){
    $BloodBagno = $_GET['delete'];
    $query = "update request set status='Cancelled' where Order_id = {$BloodBagno} and Status = 'Order Placed'";
    $result = mysqli_query($conn,$query);
//echo "<script>alert('Invalid Details');</script>";
 header("Location: ../Hospital/status.php");
}?>		

    
