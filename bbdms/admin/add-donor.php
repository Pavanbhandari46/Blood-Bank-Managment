<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['username'])==0)
	{	
header('location:index.php');
}
else{
    $Emp_Id = $_SESSION['Emp_Id'];
echo $Emp_Id;?>
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
<option value="O-">O-</option>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
</select>

</div>
</div>

<!--<div class="form-group">
<label class="col-sm-2 control-label">Date of Registration </label>
<div class="col-sm-4">
<input type="text" name="Dateofreg" placeholder = "YYYY/MM/DD"class="form-control" required>
</div>
</div>-->
											
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
        //$Dateofreg = $_POST['Dateofreg'];
        $query = "insert into blooddonor values({$Donor_id},'{$Name}','{$Age}','{$Sex}','{$Address}','{$phno}','{$BloodType}','{$History}')";

        $result = mysqli_query($conn,$query);
                        if(!$result){
                    echo"<script>alert('Donor Id already exists');</script>";
                        echo("Error description: " . mysqli_error($conn));
        }
            else{
                $query1 = "insert into dateofreg1 values({$Emp_Id},{$Donor_id},CURRENT_TIMESTAMP)";

                $result1 = mysqli_query($conn,$query1);
                if(!result1)
                {
                echo "<script>alert('Invalid date format');</script>";
            	}
            	else
            		echo "<script>alert('Donor successfully registered');</script>";
            }
        }

    ?>

		
<?php
//    if(isset($_POST['submit1'])){
//        //$Emp_id = $_POST['Emp_id'];
//        $Donor_id = $_POST['Donor_id'];
//        $Dateofreg = $_POST['Dateofreg'];
//echo $Emp_Id;
//        
//                                if(!$result1){
//                    echo"<script>alert('Donor Id already exists');</script>";
//                        //("Error description: " . mysqli_error($conn));
//        }
//            else{
//                echo "<script>alert('Office Details success fully added');</script>";
//            }
//    }
    ?>

	

	

	
	
	
    </div>	
	
</body>
</html>
<?php } ?>