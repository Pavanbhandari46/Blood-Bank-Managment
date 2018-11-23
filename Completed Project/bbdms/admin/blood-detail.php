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
					
						<h2 class="page-title">Blood Details</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>


									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">BloodBag No</label>
<div class="col-sm-4">
<input type="number" name="Blood_Bagno" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Quantity</label>
<div class="col-sm-4">
<input type="number" name="Quantity" class="form-control" required>
</div>
</div>
<div class="form-group">

<label class="col-sm-2 control-label">BloodType</label>
<div class="col-sm-4">


<select name="BType" class="form-control" required>
<option value="">Select</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
</select>

</div>
<label class="col-sm-2 control-label">Donor_id</label>
<div class="col-sm-4">
<input type="text" name="Donor_id" class="form-control" required>
</div>
</div>
                                                <div class="form-group">
<label class="col-sm-2 control-label">Date of exp</label>
<div class="col-sm-4">
<input type="text" name="Dateofexp" placeholder="YYYY/MM/DD" class="form-control" required>

</div>
</div>


												<div class="col-sm-9 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
	<?php
    if(isset($_POST['submit'])){
        $Blood_Bagno = $_POST['Blood_Bagno'];
        $Quantity = $_POST['Quantity'];
        $BType = $_POST['BType'];
        $Donor_id = $_POST['Donor_id'];
        $Dateofexp = $_POST['Dateofexp'];

        $query = "insert into blooddetails values({$Blood_Bagno},'{$Quantity}','{$BType}','{$Dateofexp}',{$Donor_id})";

        $result = mysqli_query($conn,$query);
        if(!$result)
        {   echo"<script>alert('Invalid details Please check BloodBag No or Donor_id');</script>";
            //echo ("Query Failed".mysqli_error($conn));
        }
        else{
            echo"<script>alert('Sucessfully Submitted');</script>";
        }
    }
    ?>
											</div>

										</form>
									</div>
								</div>
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