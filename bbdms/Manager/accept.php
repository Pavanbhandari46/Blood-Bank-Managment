<?php
include('includes/config.php');
$query = "Select * from bloodbank";
$donors = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($donors))
{
    
    $Btype = $row['Btype'];
    $Quantity = $row['Quantity'];
    $Amount = $row['Amount'];
    

    }
if(isset($_GET['accept'])){
    $BloodBagno = $_GET['accept'];
    //if($Quantity != 0){
    $query = "update request set status='Accepted will be delivered' where Order_id = {$BloodBagno}" ;
        $result = mysqli_query($conn,$query);
         header("Location: ../Manager/status.php");
    }
//     else{
//         echo '<script type="text/javascript">'; 
// echo 'alert("review your answer");'; 
// echo 'window.location.href = "status.php";';
// echo '</script>';
//     }
    
//echo "<script>alert('Invalid Details');</script>";
 //header("Location: ../Manager/status.php");
}?>		

    
