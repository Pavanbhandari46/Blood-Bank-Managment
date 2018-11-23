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

						<h2 class="page-title">Employee List</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading"> Info</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										    <th>Emp_id</th>
											<th>Name</th>
											<th>Phno</th>
								
											<th>Salary</th>
											<th>Role</th>
											<th>Action</th>	
										</tr>
									</thead>
									
<tbody>
                                    



<?php
$query = "Select * from employee1";
$donors = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($donors))
{
        $Emp_id = $row['Emp_id'];
        $Emp_name = $row['Name'];
        $Emp_salary = $row['salary'];
        $Emp_phno = $row['Phno'];
        $Emp_role = $row['Role'];



echo "<tr>";
echo "<td>$Emp_id</td>";
echo "<td>$Emp_name</td>";
echo "<td>$Emp_phno</td>";
echo "<td>$Emp_salary</td>";

echo "<td>$Emp_role</td>";

if($Emp_role != "Manager"){
?>
<td><a class="btn btn-danger"
<?php
  echo "href='delete1.php?delete={$Emp_id}'" 
?>

role="button">Delete</a></td>
 <?php } 
      echo "<tr>";
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