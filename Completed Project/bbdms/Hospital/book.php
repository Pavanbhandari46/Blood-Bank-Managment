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
<label class="col-sm-2 control-label">Quantity</label>
<div class="col-sm-4">
<input type="number" name="Quantity" class="form-control" required>
</div>

</div>



												<div class="col-sm-9 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Clear</button>
													<button class="btn btn-primary" name="Book" type="submit">Book </button>
												</div>
                                        </form>

                                    </div>
                                    
                                </div>
                                 <?php
    
                               
    $Hos_id = $_SESSION['Hos_id']; 
    $quantity = $_SESSION['Quantity'];
    $btype = $_SESSION['Btype'];
    $Quantity = $_POST['Quantity'];
    //echo $Hos_id;
    //echo $quantity;
    //echo $btype;
 if(isset($_POST['Book']))
{//echo $btype;
 if( $quantity == $Quantity ){
     
              $query1 = "insert into request values(NULL,'{$Hos_id}','{$btype}', CURRENT_TIMESTAMP,'{$quantity}','Order Placed') " ;
     $result = mysqli_query($conn,$query1);
     //echo $Btype;
     ?>
     <div class="alert alert-success" role="alert">
  Sucessfully Booked
</div>
 <?php }
  else{
      ?>
      <div class="alert alert-danger" role="alert">
  <h1>Sorry</h1>OUT OF STOCK!!
</div>     
 <?php }
} ?> 
                            
                     

 
     
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          
                
     
     
     
     
               


	

		
		   
		
		
		
		
		
		
		
		


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>
<?php 
} ?>