<?php
include('includes/config.php');
if(isset($_GET['delete'])){
    $BloodBagno = $_GET['delete'];
    $query = "Delete from blooddetails where Blood_Bagno = {$BloodBagno}" ;
    $result = mysqli_query($conn,$query);
    header("Location: ../admin/BloodDetailslist.php");
    
}