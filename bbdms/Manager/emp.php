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

<body>
>



						
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add Employee</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>


									<div class="panel-body">

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">

<label class="col-sm-2 control-label">Full name</label>
<div class="col-sm-4">
<input type="text" name="Emp_name" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">phno</label>
<div class="col-sm-4">
<input type="text" name="Emp_phno" onKeyPress="return isNumberKey(event)"  maxlength="10" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Role</label>
<div class="col-sm-4">
<input type="text" name="Emp_role" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">username</label>
<div class="col-sm-4">
<input type="text" name="username" class="form-control" required>
</div>
<label class="col-sm-2 control-label">password</label>
<div class="col-sm-4">
<input type="password" name="password" class="form-control" required>
</div>
</div>


											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Salary</label>
<div class="col-sm-10">
<textarea class="form-control" name="Emp_salary" ></textarea>
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
        $Emp_id = $_POST['Emp_id'];
        $Emp_name = $_POST['Emp_name'];
        $Emp_salary = $_POST['Emp_salary'];
        $Emp_phno = $_POST['Emp_phno'];
        $Emp_role = $_POST['Emp_role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "insert into employee1 values(NULL,'{$Emp_name}','{$Emp_phno}','{$Emp_role}','{$username}','{$password}','{$Emp_salary}')";

        $result = mysqli_query($conn,$query);
                                if(!$result){
                    echo"<script>alert('username already exists');</script>";
                        //("Error description: " . mysqli_error($conn));
        }
            else{
                //$query1 = "insert into dateofreg values({$Emp_Id},{$Donor_id},'{$Dateofreg}')";

                $result1 = mysqli_query($conn,$query1);
                echo "<script>alert('Employee sucessfully registered');</script>";
            }
        
    }
    ?>

		
		   
		
		
		
		
		
		
		
		
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