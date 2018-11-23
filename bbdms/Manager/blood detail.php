<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
	{	
header('location:index.php');
}
else{
    ?>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>BBDMS| Admin Add Donor</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>


	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
                

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Blood Details List</h2>

						<!-- Zero Configuration Table -->
						
						<div class="panel panel-default">
							<div class="panel-heading">Delete Blood</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										    <th>BloodBag No</th>
											<th>Quantity</th>
											<th>BloodType</th>
											<th>Date of Exp</th>
											<th>Donor_Id</th>
											<th>Action</th>

										</tr>
									</thead>
									
<tbody>
    <?php
    $query = "Select * from BloodDetails";
$Blood = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($Blood))
{
    $Blood_Bagno = $row['Blood_Bagno'];
    $Quantity = $row['Quantity'];
    $Btype = $row['Btype'];
    $Dateofexp = $row['Dateofexp'];
    $Donor_id = $row['Donor_id'];



echo "<tr>";
echo "<td>$Blood_Bagno</td>";
echo "<td>$Quantity</td>";
echo "<td>$Btype</td>";
echo "<td>$Dateofexp</td>";
echo "<td>$Donor_id</td>";

?>
<td><a class="btn btn-danger"
<?php
  echo "href='delete1.php?delete={$Blood_Bagno}'" 
?>

role="button">Delete</a></td>
 <?php echo "<tr>";
     } ?>


 
                                    


									
</tbody>
								</table>

  													
    </div>
             


<?php
                              



?>
                                                   

                                                   
                                                   
                                                   
                                                   
                                                                                                   
                                                    
                                                    


												</div>
											</div>

						

							</div>
						</div>
					</div>
				</div>
            </div>


	
</body>
</html>
<?php } ?>