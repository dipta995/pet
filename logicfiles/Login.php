<?php
include_once 'dbconnection.php';
include_once 'SessionClass.php';
   
class Login  extends DBconnection
{
	public function __construct(){
		$this->connectDataBase();

}
	public function selectQuery($query){
		$result = $this->con->query($query);
		if($result){
			return $result;
		} else {
			return $msg='no result found';
		}
	}

public function Logincustomer($a,$b,$redirect_link){
		$customer_email = mysqli_real_escape_string($this->con, $a);
		$customer_password = mysqli_real_escape_string($this->con, $b);
		$customer_password = md5($customer_password);

		if (empty($customer_email) || empty($customer_password)) {
				$loginmsg = "field must not be empty";
				return $loginmsg;
			}else{
				$sql = "SELECT * FROM tbl_customer WHERE customer_email= '$customer_email' and customer_password = '$customer_password'";
		
				$result = self::selectQuery($sql);
				if ($result !=false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
              if ($row > 0) {
                    Session::set("login", true);
                    
                    Session::set("customer_id",$value['customer_id']);
                    Session::set("customer_fname",$value['customer_fname']);
                    Session::set("customer_image",$value['customer_image']);
  
                     if (empty($redirect_link)) {
                	header("Location:index.php");
                }else{
                	header("Location:".$redirect_link);
                }
                } else {
                    $loginmsg = "<span style='color:red;'>Invelied user or password</span>";
					return $loginmsg;

                }
            }else{
					$loginmsg = "<span style='color:red;'>Something wrong</span>";
					return $loginmsg;

				}
			}
	}

public function Loginseller($a,$b){
		$customer_email = mysqli_real_escape_string($this->con, $a);
		$customer_password = mysqli_real_escape_string($this->con, $b);

		if (empty($customer_email) || empty($customer_password)) {
				$loginmsg = "field must not be empty";
				return $loginmsg;
			}else{
				$sql = "SELECT * FROM tbl_seller WHERE seller_email= '$customer_email' and seller_password = '$customer_password'";
		
				$result = self::selectQuery($sql);
				$query = "SELECT * FROM tbl_admin WHERE admin_email= '$customer_email' and admin_password = '$customer_password'";
		
				$results = self::selectQuery($query);
				 
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
                $values = mysqli_fetch_array($results);
                $rows = mysqli_num_rows($results);
              if ($row > 0) {
                    Session::set("login", true);
                    Session::set("seller",'sellernotcheck');
                    Session::set("seller_id",$value['seller_id']);
                    Session::set("seller_name",$value['seller_name']);
                    Session::set("seller_image",$value['seller_image']);
  
                    header("Location:index.php");
                } elseif ($rows > 0) {
                    Session::set("login", true);
                    Session::set("admin",'admin');
                    Session::set("seller_id",$values['admin_id']);
                    Session::set("seller_name",$values['admin_name']);
                    Session::set("seller_image",$values['admin_image']);
  
                    header("Location:index.php");
                } else {
                    $loginmsg = "<span style='color:red;'>Invelied user or password</span>";
					return $loginmsg;

                }
            
			}
	}






}
?>
					

