<?php 
include_once 'dbconnection.php';


class SelectClass extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}
	public function textshort($text, $limit = 300){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ')); // string possition into space 
        $text = $text."...";
        return $text;

    }


	public function selectQuery($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}elseif($result->num_rows==0){
			return $result;
		} else {
			return $msg='no result found';
		}
	}


	public function selectallcat(){
		$query = "SELECT * FROM tbl_cat";
		$result = self::selectQuery($query);
		return $result;
	}
	public function selectalladmin(){
			$query = "SELECT * FROM tbl_admin";
			$result = self::selectQuery($query);
			return $result;
		}
public function admincheckbyid($id){
			$query = "SELECT * FROM tbl_admin WHERE admin_id = $id";
			$result = self::selectQuery($query);
			return $result;
		}

	public function selectallsubcat($id){
		$query = "SELECT * FROM tbl_subcat WHERE cat_id = '$id'";
		$result = self::selectQuery($query);
		return $result;
	}
	public function selectallsub(){
		$query = "SELECT * FROM tbl_subcat";
		$result = self::selectQuery($query);
		return $result;
	}
	public function customerprofile($id){
		$query = "SELECT * FROM tbl_customer WHERE customer_id = $id";
		$result = self::selectQuery($query);
		return $result;
	}
	public function selectallsubjoin(){
		$query = "SELECT * FROM tbl_cat INNER JOIN tbl_subcat ON tbl_cat.cat_id = tbl_subcat.cat_id ORDER BY tbl_subcat.cat_id ASC";
		$result = self::selectQuery($query);
		return $result;
	}
	public function viewproductbyid($id){
		$query = "SELECT * FROM tbl_product INNER JOIN tbl_cat ON tbl_product.cat_id = tbl_cat.cat_id WHERE pro_id = $id";
		$result = self::selectQuery($query);
		return $result;
	}
	public function viewproductadminbyid($id){
		$query = "SELECT * FROM tbl_product INNER JOIN tbl_subcat ON tbl_product.sub_id = tbl_subcat.sub_id INNER JOIN tbl_cat ON tbl_product.cat_id = tbl_cat.cat_id WHERE pro_id = $id";
		$result = self::selectQuery($query);
		return $result;
	}
	public function selectcustomertables(){
			$query = "SELECT * FROM tbl_customer";
			$result = self::selectQuery($query);
			return $result;
	}
	public function selectsellertables(){
			$query = "SELECT * FROM tbl_seller";
			$result = self::selectQuery($query);
			return $result;
	}
	public function selectcustomertable(){
			$query = "SELECT * FROM tbl_customer INNER JOIN tbl_notification ON tbl_customer.customer_id = tbl_notification.customer_id ORDER BY tbl_notification.notification ASC";
			$result = self::selectQuery($query);
			return $result;
	}

	public function selectproductlimit(){
			$query = "SELECT * FROM tbl_product ORDER BY rat_hit DESC  limit 20";
			$result = self::selectQuery($query);
			return $result;
			

	}
	public function newupproduct(){
			$query = "SELECT * FROM tbl_product ORDER BY pro_id DESC  limit 3";
			$result = self::selectQuery($query);
			return $result;
	}
	public function randomproductlimit(){
			$query = "SELECT * FROM tbl_product ORDER BY RAND()  limit 3";
			$result = self::selectQuery($query);
			return $result;
	}

	public function commentview($id){
			$query = "SELECT * FROM tbl_review WHERE product_id = $id";
			$result = self::selectQuery($query);
			return $result;
			

	}
	public function viewsellerprofileforup($id){
			$query = "SELECT * FROM tbl_seller WHERE seller_id = $id";
			$result = self::selectQuery($query);
			return $result;	
	}
	public function viewadminprofileforup($id){
			$query = "SELECT * FROM tbl_admin WHERE admin_id = $id";
			$result = self::selectQuery($query);
			return $result;	
	}
	
	public function selectproduct(){
			$query = "SELECT * FROM tbl_product ORDER BY pro_id DESC";
			$result = self::selectQuery($query);
			return $result;
	}
	public function selectproductcustomer($seller_id){
			$query = "SELECT * FROM tbl_product WHERE seller_id=$seller_id ORDER BY pro_id DESC";
			$result = self::selectQuery($query);
			return $result;
	}
	public function selectproductpagi($start_form,$per_page){
			$query = "SELECT * FROM tbl_product ORDER BY pro_id DESC limit $start_form,$per_page";
			$result = self::selectQuery($query);
			return $result;
	}
	public function selectproductfrseller($id){
			$query = "SELECT * FROM tbl_product WHERE seller_id = $id";
			$result = self::selectQuery($query);
			return $result;
	}

	public function productviewbysubcat($id){
		$query = "SELECT * FROM tbl_product WHERE sub_id = $id";
		$result = self::selectQuery($query);
		return $result;
	}
	public function productviewforsearch($key){
		$query = "SELECT * FROM tbl_product LEFT JOIN  tbl_subcat on tbl_subcat.sub_id = tbl_product.sub_id WHERE sub_name LIKE '%$key%' OR title LIKE '%$key%'";
		$result = self::selectQuery($query);
		return $result;
	}
	public function productviewbysubcatpagi($start_form,$per_page,$id){
		$query = "SELECT * FROM tbl_product WHERE sub_id = $id limit $start_form,$per_page";
		$result = self::selectQuery($query);
		return $result;
	}
	public function productviewbysubcatown($subid,$id){
		$query = "SELECT * FROM tbl_product WHERE sub_id = $subid AND seller_id = $id";
		$result = self::selectQuery($query);
		return $result;
	}
	public function selectrelated($id){
		$query = "SELECT * FROM tbl_product WHERE cat_id='$id' ORDER BY RAND() limit 6";
		$result = self::selectQuery($query);
		return $result;
	}
	public function selerecentview($id){
		$query = "SELECT * FROM tbl_recentview LEFT JOIN tbl_product ON tbl_recentview.product_id =tbl_product.pro_id WHERE customer_id='$id' ORDER BY viewin DESC limit 3";
		$result = self::selectQuery($query);
		return $result;
	}

	public function selerecentviewunlimit($start_form,$per_page,$id){
		$query = "SELECT * FROM tbl_product LEFT JOIN tbl_recentview ON tbl_recentview.product_id =tbl_product.pro_id WHERE customer_id='$id' ORDER BY viewin DESC limit $start_form,$per_page";
		$result = self::selectQuery($query);
		return $result;
	}

	
	public function viewmostsold(){
		$query = "SELECT * FROM tbl_product ORDER BY hit DESC limit 3";
		$result = self::selectQuery($query);
		return $result;
	}
	public function viewmostsoldunlimit($start_form,$per_page){
		$query = "SELECT * FROM tbl_product WHERE rat_avg >5 ORDER BY hit DESC limit $start_form,$per_page ";
		$result = self::selectQuery($query);
		return $result;
	}
	public function productviewatcart($customer){
		$query = "SELECT * FROM tbl_cart WHERE customer_id='$customer'AND checkout=0 ";
		$result = self::selectQuery($query);
		return $result;
	}
	public function productviewatcartprocess($customer){
		$query = "SELECT * FROM tbl_cart WHERE customer_id='$customer'AND checkout=1 ";
		$result = self::selectQuery($query);
		return $result;
	}
	public function productviewatcartfinal($customer){
		$query = "SELECT * FROM tbl_cart WHERE customer_id='$customer'AND checkout=2 ";
		$result = self::selectQuery($query);
		return $result;
	}
	public function productviewatcartfinaladmin($customer){
			$query = "SELECT * FROM tbl_cart WHERE customer_id='$customer'AND checkout=2";
			$result = self::selectQuery($query);
			return $result;
		}
	public function notificationcheck($customer){
				$query = "SELECT * FROM tbl_notification WHERE customer_id='$customer'";
				$result = self::selectQuery($query);
				return $result;
			}
	public function viewallsocial(){
		$query = "SELECT * FROM tbl_social";
		$result = self::selectQuery($query);
		return $result;
	}
	public function viewallsocialID($id){
		$query = "SELECT * FROM tbl_social WHERE id = '$id'";
		$result = self::selectQuery($query);
		return $result;
	}










	
/*
	public function selectpetsAuthor($id){
					$query = "SELECT * FROM product_pet LEFT JOIN pet_cat ON product_pet.pcat_id = pet_cat.pcat_id WHERE author_id = $id";
					$result = self::selectQuery($query);
					return $result;
				}
	public function selectpetslimit(){
							$query = "SELECT * FROM product_pet limit 10";
							$result = self::selectQuery($query);
							return $result;
						}

	public function selectpetsbyid($id){
						$query = "SELECT * FROM product_pet LEFT JOIN pet_cat ON product_pet.pcat_id = pet_cat.pcat_id WHERE product_pet.ppet_id=$id";
						$result = self::selectQuery($query);
						return $result;
					}


public function selectrelated($id){
						$query = "SELECT * FROM product_pet WHERE pcat_id=$id ORDER BY RAND() limit 6";
						$result = self::selectQuery($query);
						return $result;
					}


*/









}



 ?>



