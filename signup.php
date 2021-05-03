
	<?php
 
  include_once 'logicfiles/InsertClass.php';
  $insert = new InsertClass();
 
	?>
<!DOCTYPE html> 
<html> 
<style> 
	/*set border to the form*/ 
	
	form { 
		border: 3px solid #f1f1f1; 
		width: 600px;
		margin: 0 auto;
	} 
	/*assign full width inputs*/ 
	
	input[type=email], 
	input[type=text], 
	input[type=password] { 
		width: 100%; 
		padding: 12px 20px; 
		margin: 8px 0; 
		display: inline-block; 
		border: 1px solid #ccc; 
		box-sizing: border-box; 
	} 
	/*set a style for the buttons*/ 
	
	button { 
		background-color: #4CAF50; 
		color: white; 
		padding: 14px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
		width: 100%; 
	} 
	/* set a hover effect for the button*/ 
	
	button:hover { 
		opacity: 0.8; 
	} 
	/*set extra style for the cancel button*/ 
	
	.cancelbtn { 
		width: auto; 
		padding: 10px 18px; 
		background-color: #f44336; 
	} 
	/*centre the display image inside the container*/ 
	
	.imgcontainer { 
		text-align: center; 
		margin: 24px 0 12px 0; 
	} 
	/*set image properties*/ 
	
	img.avatar { 
		width: 21%;
border-radius: 11%;
	} 
	/*set padding to the container*/ 
	
	.container { 
		padding: 16px; 
	} 
	/*set the forgot password text*/ 
	
	span.psw { 
		float: right; 
		padding-top: 16px; 
	} 
	/*set styles for span and cancel button on small screens*/ 
	
	@media screen and (max-width: 300px) { 
		span.psw { 
			display: block; 
			float: none; 
		} 
		.cancelbtn { 
			width: 100%; 
		} 
	} 
</style> 

<body> 
	 			

	<!--Step 1 : Adding HTML-->
	<form action="" method="post" enctype="multipart/form-data"> 
		<div class="imgcontainer"> 
			<img src="img/logo1.png"
				alt="Avatar" class="avatar"> 
	<h2>Create New Account</h2> 
			<?php
                            
                         if($_SERVER['REQUEST_METHOD']=='POST'){
                         	
                        $reg = $insert->Createcustomer($_POST,$_FILES);
                        if ($reg) {
                            echo "<span style='color:red'>".$reg."</span>";
                          
                        }

                        }
                        ?>
		</div> 

		<div class="container"> 
			<label><b>First Name</b></label> 
			<input type="text" placeholder="Enter Firstname" name="customer_fname" required> 

			<label><b>Lastname</b></label> 
			<input type="text" placeholder="Enter lastname" name="customer_lname" required> 
			<label><b>Email</b></label> 
			<input type="email" placeholder="Enter email" name="customer_email" required> 

			<label><b>Password</b></label> 
			<input type="password" placeholder="Enter Password" name="customer_password" required>
			 <label><b>phone</b></label> 
			<input type="text" placeholder="Enter Username" name="customer_phone" required> 

			<label><b>Image</b></label> 
			<input type="file" placeholder="Enter Password" name="image" required> 
			<label><b>Gender</b></label> 
			<input type="radio" value="Male" name="customer_gender"> 
			<label><b>Male</b></label> 
			<input type="radio" value="Female" checked name="customer_gender"> 
			<label><b>Female</b></label> 

			<button type="submit">Signup</button> 
		 
		</div> 

		<div class="container" style="background-color:#f1f1f1"> 
		<!-- 	<button type="button" class="cancelbtn">Cancel</button>  -->
			<span class="psw">Already have an account? <a href="login.php">Log In</a></span> 
		</div> 
	</form> 

</body> 

</html> 
