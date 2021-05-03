<?php 
include_once 'dbconnection.php';

class InsertClass extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}
	public function validateName($name) {
    if (preg_match("/^[a-zA-Z'. -]+$/", $name)) {
        return $name;  
	    }
	    return false;
	}
	public function validateAge($age) {
    if (preg_match("/^[0-9]+$/", $age)) {
        return $age;  
		    }
		    return false;
		}

		public function validatePrice($price) {
    if (preg_match("/^[0-9]+(\.[0-9]{2})?$/", $price)) {
        return $price;  
	    }
	    return false;
	}
public function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;  
    }
    return false;
}


	public function insertQuery($query){
		$insert = $this->con->query($query) or die($this->con->error.__LINE__);
		if($insert){
			return $insert;
		} else {
			return false;
		}
	}
	public function select($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result){
			return $result;
		} else {
			return $msg='no result found';
		}
	}


	public function Createcustomer($data,$file){

	
		$customer_fname = mysqli_real_escape_string($this->con, $data['customer_fname']);
		$customer_lname = mysqli_real_escape_string($this->con, $data['customer_lname']);
		$customer_email  = mysqli_real_escape_string($this->con, $data['customer_email']);
		$customer_phone = mysqli_real_escape_string($this->con, $data['customer_phone']);
		$customer_password = mysqli_real_escape_string($this->con, $data['customer_password']);
		$customer_password = md5($customer_password);
		$customer_gender = mysqli_real_escape_string($this->con, $data['customer_gender']);

		if (empty($customer_fname)||empty($customer_lname)||empty($customer_email)||empty($customer_phone)||empty($customer_password)||empty($customer_gender) ) {
			  $loginmsg = "Field must not be empty";
					return $loginmsg;

		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$customer_fname)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use A-z Character For Name</div>";
				return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$customer_lname)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use A-z Character For Name</div>";
				return $loginmsg;
		}elseif (strlen($customer_password)<7) {
			$loginmsg = "<div class='alert alert-danger'>Minimum Password Will Eight Character</div>";
				return $loginmsg;
		}elseif (preg_match("/[^0-9+\(\)-]/",$customer_phone)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use 0-9 Character For Mobile Number</div>";
				return $loginmsg;
		}elseif (strlen($customer_phone)<11) {
			$loginmsg = "<div class='alert alert-danger'>Minimum Mobile Number Will 11 Character</div>";
				return $loginmsg;
		}

		else{


		


	/*	$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');*/
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "img/".$unique_image;
	    $move_image = "img/".$unique_image;
$sqls = "SELECT * FROM tbl_customer WHERE customer_email= '$customer_email'";
		
				$results = self::insertQuery($sqls);
				  $rows = mysqli_num_rows($results);
              if ($rows > 0) {
              	$loginmsg = "<div class='alert alert-danger'>Already Used this email Please Try Using Another email</div>";
				return $loginmsg;
              }else{


	    move_uploaded_file($file_temp, $move_image);
		
		$sqlquery = "INSERT INTO  tbl_customer(customer_fname,customer_lname,customer_email,customer_phone,customer_password,customer_gender,customer_image)VALUES('$customer_fname','$customer_lname','$customer_email ','$customer_phone','$customer_password','$customer_gender','$uploaded_image')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				
				 if (empty($redirect_link)) {
                	header("Location:index.php");
                }else{
                	header("Location:".$redirect_link);
                }
			}else{
				$message = "<span style='color:red;'>post not inserted</span>";
				return $message;
			}
		}
		}
	}


	//CAT 
		public function catinsert($data){
			$cat_name = mysqli_real_escape_string($this->con, $data['cat_name']);
			 
			if (empty($cat_name)) {
$message = "<span style='color:red;'>Field Must not Be empty</span>";
					return $message;
			}else{
			$sql = "INSERT INTO tbl_cat(cat_name)VALUES('$cat_name')";
			$insert_row = self::insertQuery($sql);
			if ($insert_row) {
					
					$message = "<span style='color:green;'>Catagorie Added Successfully</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}

			 
		}

		public function createadmin($data){
					$admin_name = mysqli_real_escape_string($this->con, $data['admin_name']);
					$admin_email = mysqli_real_escape_string($this->con, $data['admin_email']);
					$admin_password = mysqli_real_escape_string($this->con, $data['admin_password']);
					$flag = mysqli_real_escape_string($this->con, $data['flag']);
					if (empty($admin_name)||empty($admin_email)||empty($admin_password)||empty($flag)) {
						$msg = "Field must not be empty";
						return $msg;
					}else{
		$sql = "INSERT INTO tbl_admin(admin_name,admin_email,admin_password,flag)VALUES('$admin_name','$admin_email','$admin_password','$flag')";
					$insert_row = self::insertQuery($sql);
					if ($insert_row) {
							
							$message = "<span style='color:green;'>post inserted</span>";
							return $message;
						}else{
							$message = "<span style='color:red;'>post not inserted</span>";
							return $message;
						}

					}

					 
				}




		public function reviewinsert($data,$prid){

		

			$name = mysqli_real_escape_string($this->con, $data['name']);
			$email = mysqli_real_escape_string($this->con, $data['email']);
			$newhit = mysqli_real_escape_string($this->con, $data['rathit']);
			$review = mysqli_real_escape_string($this->con, $data['review']);
			 
			$query = "SELECT * FROM tbl_product WHERE pro_id=$prid";
			$result = self::select($query);
			$getd = $result->fetch_assoc();
			$prehit = $getd['rat_hit'];
			$avgrat = $getd['rat_avg'];


			$presenthit = number_format($prehit)+($newhit);
			$avgratcheck = number_format($avgrat)+1;







			if (empty($presenthit)) {
				$msg = "Field must not be empty";
				return $msg;
			}else{
			$sql = "INSERT INTO tbl_review(name,email,review,product_id)VALUES('$name','$email','$review','$prid')";
			$sqls= "UPDATE tbl_product SET rat_hit = '$presenthit', rat_avg = '$avgratcheck' WHERE pro_id = '$prid'";
			$insert_row = self::insertQuery($sql);
		 
			$insertss = self::insertQuery($sqls);
			if ($insert_row) {
					
					$message = "<span style='color:green;'>post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}

			 
		}
	//CAT END 

	//CAT 
		public function subinsert($data){
			$cat_id = mysqli_real_escape_string($this->con, $data['cat_id']);

			$sub_name = mysqli_real_escape_string($this->con, $data['sub_name']);
			$sub_name = self::validateName($sub_name);
			if (empty($sub_name)) {
				$message = "<span style='color:red;'>Field Must not Be empty</span>";
					return $message;
			}else{
			$sql = "INSERT INTO tbl_subcat(cat_id,sub_name)VALUES('$cat_id','$sub_name')";
			$insert_row = self::insertQuery($sql);
			if ($insert_row) {
					
					$message = "<span style='color:green;'>Sub Catagorie Added</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}

			 
		}
		public function datastore($data,$id,$cartid){



			$query = "SELECT * FROM tbl_product WHERE pro_id='$data'";
			$result = self::select($query);
			$value = $result->fetch_assoc();
			$prehit = $value['hit'];


			$presenthit = $prehit+1;

			$product_id = mysqli_real_escape_string($this->con, $data);
			//$sub_name = mysqli_real_escape_string($this->con, $data['sub_name']);
			if (empty($product_id)) {
				$msg = "Field must not be empty";
				return $msg;
			}else{
			$sqldel = "INSERT INTO storage(product_id,customer_id)VALUES('$product_id','$id')";
			$sql = "DELETE FROM tbl_cart WHERE cart_id = $cartid";
			$upque = "UPDATE tbl_product SET hit = '$presenthit' WHERE pro_id = '$data'";


			$insert_row = self::insertQuery($sql);
			$insert = self::insertQuery($sqldel);
			$upss = self::insertQuery($upque);
			if ($insert_row) {
					echo "<script> window.location = 'confirmtable.php?customer=$id';</script>";
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}

			 
		}
	//CAT END 


	//Pet Insert

	

		public function prodctinsert($data,$file,$seller_id){
		$cat_id = mysqli_real_escape_string($this->con, $data['cat_id']);

		$sub_id = mysqli_real_escape_string($this->con, $data['sub_id']);
		$title = mysqli_real_escape_string($this->con, $data['title']);
		$title = self::validateName($title);
		$price = mysqli_real_escape_string($this->con, $data['price']);
		$price = self::validatePrice($price);
		$quantity = mysqli_real_escape_string($this->con, $data['quantity']);
		$details  = mysqli_real_escape_string($this->con, $data['details']);
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "img/".$unique_image;
	    $move_image = "../img/".$unique_image; 
	    if (empty($title) || empty($price) || empty($details) || empty($file_ext) ) {
	    	 $message = "<span style='color:red;'>Please Fill Up all field properly</span>";
				return $message;
	    }  else{

	    move_uploaded_file($file_temp, $move_image);
		
		$sqlquery = "INSERT INTO  tbl_product(cat_id,sub_id,title,price,quantity,details,image,seller_id)VALUES('$cat_id','$sub_id','$title','$price','$quantity','$details','$uploaded_image','$seller_id')";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
				
				$message = "<span style='color:green;'>post inserted</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post not inserted</span>";
				return $message;
			}
		}
	}

	public function sellerreg($data,$file){
			$seller_name = mysqli_real_escape_string($this->con, $data['seller_name']);
			$seller_email = mysqli_real_escape_string($this->con, $data['seller_email']);
			$seller_password = mysqli_real_escape_string($this->con, $data['seller_password']);
			$seller_phone = mysqli_real_escape_string($this->con, $data['seller_phone']);
			if (empty($seller_name)||empty($seller_email)||empty($seller_password)||empty($seller_phone) ) {
			return $loginmsg = "<div class='alert alert-danger'>Field must not be empty</div>";

		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$seller_name)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use A-z Character For Name</div>";
				return $loginmsg;
		} elseif (strlen($seller_password)<7) {
			$loginmsg = "<div class='alert alert-danger'>Minimum Password Will Eight Character</div>";
				return $loginmsg;
		}elseif (preg_match("/[^0-9+\(\)-]/",$seller_phone)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use 0-9 Character For Mobile Number</div>";
				return $loginmsg;
		}elseif (strlen($seller_phone)<11) {
			$loginmsg = "<div class='alert alert-danger'>Minimum Mobile Number Will 11 Character</div>";
				return $loginmsg;
		}

		else{

			
			$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
		    $file_name = $file['seller_image']['name'];
		    $file_size = $file['seller_image']['size'];
		    $file_temp = $file['seller_image']['tmp_name'];

		    $div            = explode('.', $file_name);
		    $file_ext       = strtolower(end($div));
		    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "img/".$unique_image;
		    $move_image = "../img/".$unique_image; 
	 

		    move_uploaded_file($file_temp, $move_image);
			$sqls = "SELECT * FROM tbl_seller WHERE seller_email= '$seller_email'";
		
				$results = self::insertQuery($sqls);
				  $rows = mysqli_num_rows($results);
              if ($rows > 0) {
$message = "<span style='color:red;'>Email already Registered</span>";
					return $message;
               }else{
			$sqlquery = "INSERT INTO  tbl_seller(seller_name,seller_email,seller_password,seller_phone,seller_image)VALUES('$seller_name','$seller_email ','$seller_password','$seller_phone','$uploaded_image')";
			$insert_row = self::insertQuery($sqlquery);
			if ($insert_row) {
					
					$message = "<script> window.location = 'login.php';</script>";
					return $message;
				 
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}
		}
			 
		}








	public function prodctUpdate($data,$file,$id,$seller_id){
		$cat_id = mysqli_real_escape_string($this->con, $data['cat_id']);
		$sub_id = mysqli_real_escape_string($this->con, $data['sub_id']);
		$title = mysqli_real_escape_string($this->con, $data['title']);
		$title = self::validateName($title);
		$price = mysqli_real_escape_string($this->con, $data['price']);
		$price = self::validatePrice($price);
		$quantity = mysqli_real_escape_string($this->con, $data['quantity']);
		$details  = mysqli_real_escape_string($this->con, $data['details']);
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "img/".$unique_image;
	    $move_image = "../img/".$unique_image;
	    if (empty($title) || empty($price) || empty($details) ) {
	    	 $message = "<span style='color:red;'>Please Fill Up all field properly</span>";
				return $message;
	    }  else{
	    if (!empty($file_name)) {
	    	  	$query = "SELECT * FROM tbl_product WHERE pro_id = '$id'";
	    $getdata = self::insertQuery($query);
	     	while ($selectedimg = $getdata->fetch_assoc()) { 
	            $delimg = '../'.$selectedimg['image'];
	            unlink($delimg);
	        }
	    
	     move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE tbl_product SET 
					 cat_id = '$cat_id', sub_id = '$sub_id', title = '$title', price = '$price', quantity = '$quantity', details  = '$details', image = '$uploaded_image' WHERE pro_id = '$id' AND $seller_id = '$seller_id'";
		$insert_row = self::insertQuery($sqlquery);
	    }else{
	    	$sqlquery = "UPDATE tbl_product SET cat_id = '$cat_id', sub_id = '$sub_id', title = '$title', price = '$price', quantity = '$quantity', details  = '$details' WHERE pro_id = '$id' AND $seller_id = '$seller_id'";
		$insert_row = self::insertQuery($sqlquery);
	    }if ($insert_row) {
				
				$message = "<span style='color:green;'>Updated sucessfully</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post Not Updated </span>";
				return $message;
			}
		}
	}

	public function sellerprofileUpdate($data,$file,$seller_id){
			$seller_name = mysqli_real_escape_string($this->con, $data['seller_name']);
			$seller_email = mysqli_real_escape_string($this->con, $data['seller_email']);
			$seller_phone = mysqli_real_escape_string($this->con, $data['seller_phone']);
			 
		 
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
		    $file_name = $file['seller_image']['name'];
		    $file_size = $file['seller_image']['size'];
		    $file_temp = $file['seller_image']['tmp_name'];

		    $div            = explode('.', $file_name);
		    $file_ext       = strtolower(end($div));
		    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "img/".$unique_image;
		    $move_image = "../img/".$unique_image;
		    if (!empty($file_name)) {
		    	  	$query = "SELECT * FROM tbl_seller WHERE seller_id = '$seller_id'";
		    $getdata = self::insertQuery($query);
		     	while ($selectedimg = $getdata->fetch_assoc()) { 
		            $delimg = '../'.$selectedimg['seller_image'];
		            unlink($delimg);
		        }
		    
		     move_uploaded_file($file_temp, $move_image);
		    	$sqlquery = "UPDATE tbl_seller SET 
						 seller_name = '$seller_name', seller_email = '$seller_email', seller_phone = '$seller_phone', seller_image = '$uploaded_image' WHERE $seller_id = '$seller_id'";
			$insert_row = self::insertQuery($sqlquery);
		    }else{
		    	$sqlquery = "UPDATE tbl_seller SET seller_name = '$seller_name', seller_email = '$seller_email', seller_phone = '$seller_phone' WHERE $seller_id = '$seller_id'";
			$insert_row = self::insertQuery($sqlquery);
		    }if ($insert_row) {
					
					$message = "<span style='color:green;'>post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
		}

		public function adminprofileUpdate($data,$file,$admin_id){
			$admin_name = mysqli_real_escape_string($this->con, $data['seller_name']);
			$admin_email = mysqli_real_escape_string($this->con, $data['seller_email']);
			$admin_password = mysqli_real_escape_string($this->con, $data['seller_phone']);
			 
		 
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
		    $file_name = $file['seller_image']['name'];
		    $file_size = $file['seller_image']['size'];
		    $file_temp = $file['seller_image']['tmp_name'];

		    $div            = explode('.', $file_name);
		    $file_ext       = strtolower(end($div));
		    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "img/".$unique_image;
		    $move_image = "../img/".$unique_image;
		    if (!empty($file_name)) {
		    	  	$query = "SELECT * FROM tbl_admin WHERE admin_id = '$admin_id'";
		    $getdata = self::insertQuery($query);
		     	while ($selectedimg = $getdata->fetch_assoc()) { 
		            $delimg = '../'.$selectedimg['admin_image'];
		            unlink($delimg);
		        }
		    
		     move_uploaded_file($file_temp, $move_image);
		    	$sqlquery = "UPDATE tbl_admin SET 
						 admin_name = '$admin_name', admin_email = '$admin_email', admin_password = '$admin_password', admin_image = '$uploaded_image' WHERE admin_id = '$admin_id'";
			$insert_row = self::insertQuery($sqlquery);
		    }else{
		    	$sqlquery = "UPDATE tbl_admin SET admin_name = '$admin_name', admin_email = '$admin_email', admin_password = '$admin_password' WHERE admin_id = '$admin_id'";
			$insert_row = self::insertQuery($sqlquery);
		    }if ($insert_row) {
					
					$message = "<span style='color:green;'>post inserted</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
		}



	public function  Updatecustomer($data,$file,$id){
		$customer_fname = mysqli_real_escape_string($this->con, $data['customer_fname']);
		$customer_lname = mysqli_real_escape_string($this->con, $data['customer_lname']);
		$customer_email = mysqli_real_escape_string($this->con, $data['customer_email']);
		$customer_password = mysqli_real_escape_string($this->con, $data['customer_password']);
		$customer_phone = mysqli_real_escape_string($this->con, $data['customer_phone']);
		$customer_gender  = mysqli_real_escape_string($this->con, $data['customer_gender']);
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "img/".$unique_image;
	    $move_image = "img/".$unique_image;
	    if (!empty($file_name)) {
	    	  	$query = "SELECT * FROM tbl_customer WHERE customer_id = '$id'";
	    $getdata = self::insertQuery($query);
	     	while ($selectedimg = $getdata->fetch_assoc()) { 
	            $delimg = $selectedimg['customer_image'];
	            unlink($delimg);
	        }
	    
	     move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE tbl_customer SET 
					 customer_fname = '$customer_fname', customer_lname = '$customer_lname', customer_email = '$customer_email', customer_password = '$customer_password', customer_phone = '$customer_phone', customer_gender  = '$customer_gender', customer_image = '$uploaded_image' WHERE  customer_id = '$id'";
		$insert_row = self::insertQuery($sqlquery);
	    }else{
	    	$sqlquery = "UPDATE tbl_customer 
	    	SET
	    	 customer_fname = '$customer_fname',
	    	  customer_lname = '$customer_lname',
	    	   customer_email = '$customer_email',
	    	    customer_password = '$customer_password', 
	    	    customer_phone = '$customer_phone', 
	    	    customer_gender  = '$customer_gender' 
	    	    WHERE customer_id = $id";
		$insert_row = self::insertQuery($sqlquery);
	    }if ($insert_row) {
				
				$message = "<span style='color:green;'>post inserted</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post not inserted</span>";
				return $message;
			}
	}
	//product Insert end


	//recent view indest 
	public function recentview($a,$b){
		$query = "SELECT * FROM tbl_recentview WHERE product_id = '$a'AND customer_id='$b'";
		$result = self::select($query);
				if ($result !=false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
            if ($row > 0) {
            	$sqlquery = "UPDATE tbl_recentview SET viewin = now() WHERE customer_id = '$b' AND product_id= '$a'";
		$insert_row = self::insertQuery($sqlquery);

			}else{

		$gets = "INSERT INTO tbl_recentview(product_id,customer_id)VALUES('$a','$b')";
			$results = self::insertQuery($gets);
			return $results;
		}
		}
	}





	//recent view insert data





	//CART 
		public function addcart($data){
			$cartid="";
			$title = mysqli_real_escape_string($this->con, $data['title']);
			$image = mysqli_real_escape_string($this->con, $data['image']);
			$price = mysqli_real_escape_string($this->con, $data['price']);
			$pro_id = mysqli_real_escape_string($this->con, $data['pro_id']);
			$customer_id = mysqli_real_escape_string($this->con, $data['customer_id']);
			$quantity = mysqli_real_escape_string($this->con, $data['quantity']);


		$sql = "SELECT * FROM tbl_cart WHERE customer_id='$customer_id' AND pro_id = $pro_id";
		 $check = self::insertQuery($sql);
				 
                $value = mysqli_fetch_array($check);
                $row = mysqli_num_rows($check);
              if ($row > 0) { 
              	$cartid=$value['cart_id'];


              } 
			if (empty($title) ) {
				$msg = "Field must not be empty";
				return $msg;
			}elseif($cartid!=0){

				$sqlquery = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cart_id = '$cartid'";
		$insert_row = self::insertQuery($sqlquery);


				echo "<script> window.location = 'cart.php';</script>";

			}




			else{
			$sql = "INSERT INTO tbl_cart(title,price,quantity,pro_id,customer_id,image)VALUES('$title','$price','$quantity','$pro_id','$customer_id','$image')";
			$insert_row = self::insertQuery($sql);
			if ($insert_row) {
					
					echo "<script> window.location = 'cart.php';</script>";
					 
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}

			}

			 
		}



		public function updatecarts($data){
			$quantity = mysqli_real_escape_string($this->con, $data['quantity']);
			$cart_id = mysqli_real_escape_string($this->con, $data['cart_id']);
			if (empty($quantity) ) {
				$msg = "Field must not be empty";
				return $msg;
			}else{

				$sqlquery = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
			
				//echo "<script> window.location = 'cart.php';</script>";
		}else{
			echo "error";
		}
			}
		}
	 
	public function updatesocial($data){
				$id = mysqli_real_escape_string($this->con, $data['id']);
				$social_name = mysqli_real_escape_string($this->con, $data['social_name']);
				$social_link = mysqli_real_escape_string($this->con, $data['social_link']);
				if (empty($id) ||empty($social_name) ||empty($social_link) ) {
					$msg = "Field must not be empty";
					return $msg;
				}else{

					$sqlquery = "UPDATE tbl_social SET social_name = '$social_name',social_link = '$social_link' WHERE id = '$id'";
			$insert_row = self::insertQuery($sqlquery);
			if ($insert_row) {
				
					$msg = "<span style='color:green;font-size:16px;'>Successfully Updated</span>";
					return $msg;
			}else{
				echo "error";
			}
				}
			}
		 

		public function checkouttoconfirm($customer_id){
			 
		

				$sqlquery = "UPDATE tbl_cart SET checkout = '1' WHERE customer_id = '$customer_id'";
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
			
				echo "<script> window.location = 'process.php';</script>";
		}else{
			echo "error";
		}



		}

		public function checkouttoconfirmpay($customer_id){

		$query = "SELECT * FROM tbl_notification WHERE customer_id = '$customer_id'";
		$result = self::select($query);
				if ($result !=false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
            if ($row > 0) {
            	$sqlquery = "UPDATE tbl_cart SET checkout = '2' WHERE customer_id = '$customer_id'";

					 
					$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
			
				echo "<script> window.location = 'confirm.php';</script>";
		}else{
			echo "error";
		}

			}else{



 			$sql = "INSERT INTO tbl_notification(customer_id,notification)VALUES('$customer_id','1')";
				$sqlquery = "UPDATE tbl_cart SET checkout = '2' WHERE customer_id = '$customer_id'";

		$rowsget = self::insertQuery($sql);
		$insert_row = self::insertQuery($sqlquery);
		if ($insert_row) {
			
				echo "<script> window.location = 'confirm.php';</script>";
		}else{
			echo "error";
		}
	}
}



		}
	//CART END 

		 

		




}	


 