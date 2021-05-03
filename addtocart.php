  
 <?php
  include_once 'logicfiles/SelectClass.php';
  include_once 'logicfiles/InsertClass.php';
  include_once 'logicfiles/DeleteClass.php';
  include_once 'logicfiles/Login.php';
  $select = new SelectClass();
  $insert = new InsertClass();
  $delete = new DeleteClass();
  include_once 'logicfiles/SessionClass.php';
  Session::checkSessionind($redirect_link_var);
  $customer_id = Session::get('customer_id');
 if ($_SERVER['REQUEST_METHOD']=='POST') {
      $addcart = $insert->addcart($_POST);
  }
                            $petslist = $select->viewproductbyid($_GET['proid']);
                                    if ($petslist) {
                                        while ($row = $petslist->fetch_assoc()) {
                      
                        ?>
  <form  action="" method="post" class="cart">
<div class="quantity">
<input type="text" value="<?php echo $row['title'];?>" name="title">
<input type="text" value="<?php echo $row['image'];?>" name="image">
<input type="text" value="<?php echo $row['price'];?>" name="price">
<input type="text" value="<?php echo $row['pro_id'];?>" name="pro_id">
<input type="text" value="<?php echo $customer_id;?>" name="customer_id">
<input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
</div>
<button class="add_to_cart_button" type="submit">Add to cart</button>
</form> 
<?php } } ?>