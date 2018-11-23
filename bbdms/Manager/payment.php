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
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Payment Details</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

  
									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">

<label class="col-sm-2 control-label">Hospital id<span style="color:red"></span></label>
<div class="col-sm-4">
<input type="text" name="Hos_id" onKeyPress="return isNumberKey(event)"  maxlength="10" class="form-control" required>
</div>

<label class="col-sm-2 control-label">Amount </label>
<div class="col-sm-4">
<input type="text" name="Amount" onKeyPress="return isNumberKey(event)"  maxlength="10" class="form-control" required>
</div>
</div>
<div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
				<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>
	<?php 
    $Emp_id = $_SESSION['Emp_Id'];
    
    if(isset($_POST['submit'])){
        //$Emp_id = $_POST['Emp_id'];
        $Hos_id = $_POST['Hos_id'];
        $Amount = $_POST['Amount'];
        
        
        $query = "insert into payment values({$Emp_id},'{$Hos_id}','{$Amount}')";

        $result = mysqli_query($conn,$query);
        //confirmQuery($result);
                                if(!$result){
                    echo"<script>alert('Error in empid or Hospital id');</script>";
                        //("Error description: " . mysqli_error($conn));
        }
            else{
                $query1 = "insert into dateofreg values({$Emp_Id},{$Donor_id},'{$Dateofreg}')";

                $result1 = mysqli_query($conn,$query1);
                echo "<script>alert('Payment details successfully entered');</script>";
            }
        }
    
    ?>
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