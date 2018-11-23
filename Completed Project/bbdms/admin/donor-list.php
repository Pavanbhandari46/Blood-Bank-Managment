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

						<h2 class="page-title">Donor List</h2>

						<!-- Zero Configuration Table -->
						
						<div class="panel panel-default">
							<div class="panel-heading">Donor List</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										    <th>Donor_id</th>
											<th>Name</th>
											<th>age</th>
											<th>Sex</th>
											<th>Address</th>
											<th>Phno</th>
											<th>BloodType</th>
											<th>History</th>
											

										</tr>
									</thead>
									
<tbody>
    <?php
    $query = "Select * from blooddonor";
$donors = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($donors))
{
    $Donor_id = $row['Donor_id'];
    $Name = $row['Name'];
    $Age = $row['Age'];
    $Sex = $row['Sex'];
    $Address = $row['Address'];
    $phno = $row['phno'];
    $BloodType = $row['BloodType'];
    $History = $row['History'];


echo "<tr>";
echo "<td>$Donor_id</td>";
echo "<td>$Name</td>";
echo "<td>$Age</td>";
echo "<td>$Sex</td>";
echo "<td>$Address</td>";
echo "<td>$phno</td>";
echo "<td>$BloodType</td>";
echo "<td>$History</td>";
}
?>

 
                                    


									
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