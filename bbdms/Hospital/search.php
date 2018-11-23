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
	
	<title>BBDMS| </title>

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
					
						<h2 class="page-title">Search</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>


									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Blood Group</label>
<div class="col-sm-4">
<input type="text" name="Btype" class="form-control" required>
</div>

</div>



												<div class="col-sm-9 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Clear</button>
													<button class="btn btn-primary" name="submit" type="submit">Search </button>
												</div>
                                        </form>
                                    </div>
                                </div>
                            
                     
<?php
 $Hos_id = $_SESSION['Hos_id'];    
 if(isset($_POST['submit']))
{
 $Btype  = $_POST['Btype'];
 //$Quantity  = $_POST['Quantity'];
 $query = "call search('$Btype')" ;
$result = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($result)){
        $dbBtype = $row['Btype'];
        $dbQuantity = $row['Quantity'];
     $dbamount = $row['Amount'];
     
     //echo $dbQuantity;
    }mysqli_close($con);
     include('includes/config.php');

 if($Btype == $dbBtype && $dbQuantity >0 ){
    $_SESSION['Btype'] = $dbBtype;
     $_SESSION['Quantity'] = $dbQuantity;
              //$query1 = "insert into request values(NULL,'{$Hos_id}','{$Btype}', CURRENT_TIMESTAMP,'{$Quantity}','Order Placed') " ;
     //$result = mysqli_query($conn,$query1);
     //echo ("Query Failed".mysqli_error($conn));
  ?>		
	<div class="alert alert-success" role="alert">
  Success Your Request has been sucessfully accepted
</div>
<div class="panel panel-default">
							<div class="panel-heading">Donor List</div>
							<div class="panel-body">
							
								<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										    <th>Blood Type</th>
											<th>Quantity</th>
											<th>Price</th>

											

										</tr>
									</thead>
									
<tbody>
<?php
echo "<tr>";
echo "<td>$dbBtype</td>";
echo "<td>$dbQuantity</td>";
echo "<td>$dbamount</td>";
?>	
                                    </tbody>
                                </table>
                                    
                                        
      <button class="btn btn-primary"onclick="window.location.href='book.php'">Book</button>                                  
    </div>
                                </div>

							                          
<?php } 		     

       
  elseif($Btype != $dbBtype){
      ?>
      <div class="alert alert-danger" role="alert">
 <h1>Error</h1>Please enter valid blood group!!!
</div>		
		
<?php }
  elseif($dbQuantity ==0){
      ?>
      <div class="alert alert-danger" role="alert">
  <h1>Sorry</h1>OUT OF STOCK!!
</div>     
     
     
     
     
 <?php    
  }
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