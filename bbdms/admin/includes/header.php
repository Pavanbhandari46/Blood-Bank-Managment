<div class="brand clearfix">
	<a  style="font-size: 30px; padding-top:1%; color:#ffff">BloodBank & Donor Management System </a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#">Hi <?php
                    
                    
                    $Name = $_SESSION['Name'];
                    
                    echo $Name;
                    
                    
                    
                    
                    
                    
                    
                    ?><i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="change-password.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
