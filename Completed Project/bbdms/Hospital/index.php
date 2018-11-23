<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    
    $sql = "SELECT * FROM hospital WHERE username='{$username}'";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }
    
    while($row = mysqli_fetch_array($result)){
        $dbuser_id = $row['username'];
        $dbpassword = $row['password'];
        $dbhos_name = $row['Hos_Name'];
        $dbhos_id = $row['Hos_id'];
        
        //$dbname = $row['Emp_Name'];
    }
    if($username == $dbuser_id && $password == $dbpassword){
        echo $dbhos_id;
        header("Location: ../Hospital/search.php");
        $_SESSION['username'] = $dbuser_id;
        $_SESSION['Hos_Name'] = $dbhos_name;
         $_SESSION['Hos_id'] = $dbhos_id;
                

    }
    else{
  
        echo "<script>alert('Invalid Details');</script>";

    }
    
}

?>
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
	
	<div class="login-page bk-img" style="background-image: url(img/ban.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">BloodBank  Sign </h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">

								

									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>
									<button class="btn btn-primary btn-block" name="login" type="button" onclick="window.location='signup.php'">New User? Sign Up</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	
	<!-- Loading Scripts -->
	

</body>

</html>