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

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>BBDMS</title>

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

						<h2 class="page-title">Status</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading"> Info</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
                                            <th>Order_id</th>
										    <th>Hos_id</th>
											<th>Date of Reg</th>
											<th>Req Btype</th>
								            <th>Quantity</th>
											<th>Status</th>
											
											<th>Action</th>	
										</tr>
									</thead>
									
<tbody>
                                    



<?php
//$Hos_id = $_SESSION['Hos_id'];
$query = "Select * from request where status = 'Order Placed'";

$donors = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($donors))
{
        $Order_id = $row['Order_id'];
        $Hos_id = $row['Hos_id'];
        $Dateofreq = $row['Dateofreq'];
        $Quantity = $row['Quantity'];
        $Status = $row['Status'];
        $Btype = $row['Btype'];



echo "<tr>";
echo "<td>$Order_id</td>";
echo "<td>$Hos_id</td>";
echo "<td>$Dateofreq</td>";
    echo "<td>$Btype</td>";
echo "<td>$Quantity</td>";
echo "<td>$Status</td>";

//cho "<td>$Emp_role</td>";

?>
<td>
<a class="btn btn-success"
<?php
  echo "href='accept.php?accept={$Order_id}'" 
?>

name="submit" type="submit" role="button">Accept</a>
<a class="btn btn-danger"
<?php
  echo "href='reject.php?reject={$Order_id}'" 
?>

name="submit" type="submit" role="button">Reject</a>
</td>
 <?php echo "<tr>";
     } ?>
										
									</tbody>
								</table>

						

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