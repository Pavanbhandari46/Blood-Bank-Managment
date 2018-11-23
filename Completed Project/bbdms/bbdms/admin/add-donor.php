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
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
<script language="javascript">
function isNumberKey(evt)
      {
         
        var charCode = (evt.which) ? evt.which : event.keyCode
                
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
           return false;

         return true;
      }
      </script>
</head>

<body>
>



						
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Donor</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>


									<div class="panel-body">

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Donor id</label>
<div class="col-sm-4">
<input type="text" name="Donor_id" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Full name</label>
<div class="col-sm-4">
<input type="text" name="Name" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">phno</label>
<div class="col-sm-4">
<input type="text" name="phno" onKeyPress="return isNumberKey(event)"  maxlength="10" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Age</label>
<div class="col-sm-4">
<input type="text" name="Age" class="form-control" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Gender</label>
<div class="col-sm-4">
<select name="Sex" class="form-control" required>
<option value="">Select</option>
<option value="M">Male</option>
<option value="F">Female</option>
</select>
</div>
<label class="col-sm-2 control-label">BloodType</label>
<div class="col-sm-4">


<select name="BloodType" class="form-control" required>
<option value="">Select</option>
<option value="O+">O+</option>
<option value="AB+">AB+</option>
</select>

</div>
</div>


											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Address</label>
<div class="col-sm-10">
<textarea class="form-control" name="Address" ></textarea>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">History<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="History" required> </textarea>
</div>
</div>



											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
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

	<?php
    if(isset($_POST['submit'])){
        $Donor_id = $_POST['Donor_id'];
        $Name = $_POST['Name'];
        $Age = $_POST['Age'];
        $Sex = $_POST['Sex'];
        $Address = $_POST['Address'];
        $phno = $_POST['phno'];
        $BloodType = $_POST['BloodType'];
        $History = $_POST['History'];
        $query = "insert into blooddonor values({$Donor_id},'{$Name}','{$Age}','{$Sex}','{$Address}','{$phno}','{$BloodType}','{$History}')";

        $result = mysqli_query($conn,$query);
        confirmQuery($result);
    }
    ?>

		
		
		
		
		
		
		
		
		
		
		
		
			<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Office Details</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>


									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Emp ID</label>
<div class="col-sm-4">
<input type="text" name="Emp_id" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Donar ID</label>
<div class="col-sm-4">
<input type="text" name="Donor_id" class="form-control" required>
</div>
</div>
<label class="col-sm-2 control-label">Date of Registration </label>
<div class="col-sm-4">
<input type="text" name="Dateofreg" class="form-control" required>
</div>
<div class="form-group"></div>
												<div class="col-sm-9 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit1" type="submit">Save changes</button>
												</div>
<?php
    if(isset($_POST['submit1'])){
        $Emp_id = $_POST['Emp_id'];
        $Donor_id = $_POST['Donor_id'];
        $Dateofreg = $_POST['Dateofreg'];

        $query1 = "insert into dateofreg values({$Emp_id},{$Donor_id},'{$Dateofreg}')";

        $result1 = mysqli_query($conn,$query1);
        confirmQuery($result1);
    }
    ?>
											</div>
</div>
</div>
</div>
</div>
</div>

</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>
<?php } ?>