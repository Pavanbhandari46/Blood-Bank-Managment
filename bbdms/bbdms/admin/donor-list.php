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


	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
                

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Delete Donor</h2>

						<!-- Zero Configuration Table -->
						
						<div class="panel panel-default">
							<div class="panel-heading">Delete Donor</div>
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
    																						                                                  <form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Donor_id</label>
<div class="col-sm-4">
<input type="text" name="Donor_id" class="form-control" required>
</div>
   													<button class="btn btn-primary" name="submit" type="submit">Delete</button>
  													
    </div>
             </form>

<?php
                              
if(isset($_POST['submit']))    
{$result=0;
    
    $result = $_POST['Donor_id'];
    $query = "delete from blooddonor where Donor_id = $result";
    
    $resultquery  = mysqli_query($conn,$query);
    confirmQuery($query);
    header('location:donor-list.php');

}


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