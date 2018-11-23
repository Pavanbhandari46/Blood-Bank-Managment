<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank  Management System</title>
    <title>BloodBank  Management System</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
<style>
    .navbar-toggler {

        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
        	
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>
 
</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>
 


   
    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to BloodBank Management System</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">The need for blood</h4>
                   
                        <p class="card-text" style="padding-left:2%">We need to make sure that we have enough supplies of all blood groups and blood types to treat all types of conditions.

By giving blood, every donor helps us meet the challenge of providing life-saving products whenever and wherever they are needed. </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Blood components</h4>
                   
                        <p class="card-text" style="padding-left:2%">Your blood's main components are red cells, plasma and platelets. These are used to treat many different illnesses and conditions.

They have a short shelf life, so we always need to top up the supply:

red blood cells can be stored for up to 35 days
platelets can be stored for up to 7 days
plasma can be stored for up to 3 years </p>
                </div>
            </div>
 

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>BLOOD GROUPS</h2>
          <p>  blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul>
                
                
<li>A positive or A negative</li>
<li>B positive or B negative</li>
<li>O positive or O negative</li>
<li>AB positive or AB negative.</li>
                </ul>
                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
The most common blood type is O, followed by type A.

Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
            </div>
         
   
  <?php include('includes/footer.php');?>

   

</body>

</html>
