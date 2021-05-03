<?php 
include_once 'dbconnection.php';




class DeleteClass extends DBconnection{


	public function __construct(){
		$this->connectDataBase();
		
		
	}
	public function supportdeleteQuery($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result){
			return $result;
		} else {
			return $msg='no result found';
		}
	}



	public function removecat($id){
		$sql = "DELETE FROM tbl_cat WHERE cat_id = $id";
		$insert_row = self::supportdeleteQuery($sql);
			if ($insert_row) {
				return "<script> window.location = 'createcat.php';</script>";
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
	}
	public function adminremove($id){
			$sql = "DELETE FROM tbl_admin WHERE admin_id = $id";
			$insert_row = self::supportdeleteQuery($sql);
				if ($insert_row) {
					return "<script> window.location = 'adminprofile.php';</script>";
					}else{
						$message = "<span style='color:red;'>post not inserted</span>";
						return $message;
					}
		}

			public function customerremove($id){
			$sql = "DELETE FROM tbl_customer WHERE customer_id = $id";
			$insert_row = self::supportdeleteQuery($sql);
				if ($insert_row) {
					return "<script> window.location = 'customerprofile.php';</script>";
					}else{
						$message = "<span style='color:red;'>post not inserted</span>";
						return $message;
					}
		}




	 public function removesub($id){
 		$sql = "DELETE FROM tbl_subcat WHERE sub_id = $id";
		$insert_row = self::supportdeleteQuery($sql);
			if ($insert_row) {
				return "<script> window.location = 'createcat.php';</script>";
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
	}


	public function delcartpro($id){
		$sql = "DELETE FROM tbl_cart WHERE cart_id = $id";
		$insert_row = self::supportdeleteQuery($sql);
			if ($insert_row) {
				echo "<script> window.location = 'cart.php';</script>";
				}else{
					$message = "<span style='color:red;'>Something wrong</span>";
					return $message;
				}
	}
	public function delcartproadmin($id,$customer){
		$sql = "DELETE FROM tbl_cart WHERE cart_id = $id";
		$insert_row = self::supportdeleteQuery($sql);
			if ($insert_row) {
				echo "<script> window.location = 'confirmtable.php?customer=$customer';</script>";
				}else{
					$message = "<span style='color:red;'>Something wrong</span>";
					return $message;
				}
	}
	public function removenotification($id){
		$sql = "DELETE FROM tbl_notification WHERE notification_id = $id";
		$insert_row = self::supportdeleteQuery($sql);
			if ($insert_row) {
				echo "<script> window.location = 'confirmtable.php';</script>";
				}else{
					$message = "<span style='color:red;'>Something wrong</span>";
					return $message;
				}
	}

	  public function removeproduct($id){
	  	$query = "SELECT * FROM tbl_product WHERE pro_id = '$id'";
	    $getdata = self::supportdeleteQuery($query);
	     	while ($selectedimg = $getdata->fetch_assoc()) { 
	            $delimg = '../'.$selectedimg['image'];
	            unlink($delimg);
	        }
 		$sql = "DELETE FROM tbl_product WHERE pro_id = $id";
		$insert_row = self::supportdeleteQuery($sql);
			if ($insert_row) {
				return "<script> window.location = 'selpets.php';</script>";
				}else{
					$message = "<span style='color:red;'>post not inserted</span>";
					return $message;
				}
	}
	 

}


 ?>



