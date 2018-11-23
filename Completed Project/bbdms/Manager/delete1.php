<?php
include('includes/config.php');
if(isset($_GET['delete'])){
    $BloodBagno = $_GET['delete'];
    $query = "Delete from employee1 where Emp_id = {$BloodBagno}" ;
    $result = mysqli_query($conn,$query);
    header("Location: ../Manager/emplist.php");
    
}