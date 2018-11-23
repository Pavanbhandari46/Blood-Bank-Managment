
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>BloodBank  Management System | Admin Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
<div style="background-color:lightblue">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">BloodBank  Sign Up</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Hospital Name</label>
									<input type="text" placeholder="Name" name="Hos_Name" class="form-control mb" required>
									<label for="" class="text-uppercase text-sm">Phone</label>
									<input type="number" placeholder="Phone" name="Hos_phno" class="form-control mb" required>
									<label for="" class="text-uppercase text-sm">Address</label>
									<input type="text" placeholder="Address" name="Hos_Address" class="form-control mb" required>
									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb" required>
									<label for="" class="text-uppercase text-sm">Confirm Password</label>
									<input type="password" placeholder="Password" name="cpassword" class="form-control mb" required>

								

									<button class="btn btn-primary btn-block" name="submit" type="submit"> Sign Up</button>

								</form>
							</div>
<?php
    include('includes/config.php');
    if(isset($_POST['submit'])){
        $password=0;
        $cpassword=1;
        $Hos_Name = $_POST['Hos_Name'];
        $Hos_phno = $_POST['Hos_phno'];
        $Hos_Address = $_POST['Hos_Address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if($password === $cpassword){
            $query = "insert into hospital values(NULL,'{$Hos_Name}','{$Hos_phno}','{$Hos_Address}','{$username}','{$password}')";

            $result = mysqli_query($conn,$query);
                if(!$result){
                    echo"<script>alert('Username already exists');</script>";
                        //("Error description: " . mysqli_error($conn));
        }
            else{
                echo "<script>alert('You have been sucessfully registered');</script>";
            }
        }
        else
        {
           echo "<script>alert('error');</script>";  
        }
    }
    ?>
							
							
							
							
							
							
							
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	

	

</body>

</html>