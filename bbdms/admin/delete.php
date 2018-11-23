<?php
include('includes/config.php');
if(isset($_GET['delete'])){
    $donor_id = $_GET['delete'];
    $query = "Delete from blooddonor where Donor_id = {$donor_id}" ;
    $result = mysqli_query($conn,$query);
    header("Location: ../admin/donor-list.php");
    
}




?>