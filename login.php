
	<?php
  include_once 'logicfiles/SelectClass.php';
  include_once 'logicfiles/InsertClass.php';
 
  include_once 'logicfiles/Login.php';
//$redirect_link = $_REQUEST['re_link'];
  $select = new SelectClass();
  $insert = new InsertClass();
  $lg = new Login();
   Session::checkLogin();
  $redirect_link = "";
if (empty($_REQUEST['re_link']) || $_REQUEST['re_link']==NULL) {
}else{
  
$redirect_link = $_REQUEST['re_link'];
}


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
	<form action="" method="post"> 
		<div class="imgcontainer"> 
			<img src="img/logo1.png"
				alt="Avatar" class="avatar"> 
	<h2>Login Form</h2> 
		<?php
                            
                         if($_SERVER['REQUEST_METHOD']=='POST'){
                           $customer_email = $_POST['customer_email'];
                            $customer_password = $_POST['customer_password'];
                        $login = $lg->Logincustomer($customer_email,$customer_password,$redirect_link);
                        if ($login) {
                            echo $login;
                      
                        }

                        }
                        ?>
		</div> 

		<div class="container"> 
			<label><b>Email</b></label> 
			<input type="email" placeholder="Enter Username" name="customer_email" required> 

			<label><b>Password</b></label> 
			<input type="password" placeholder="Enter Password" name="customer_password" required> 

			<button type="submit">Login</button> 
		 
		</div> 

		<div class="container" style="background-color:#f1f1f1"> 
			<!-- <button type="button" class="cancelbtn">Cancel</button> 
 -->			<span class="psw"><a href="signup.php">Create Account</a></span> 
		</div> 
	</form> 

</body> 

</html> 
