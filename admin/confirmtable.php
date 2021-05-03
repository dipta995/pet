<?php include 'header.php'; ?>
<?php $totals=""; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">
<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Gender</th>
                      <th>Start date</th>
                      <th>Creation</th>
                      <th>Credit</th>
                      <th>
                         <?php

                         ?>
                      </th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                       if (isset($_GET['delcartpro'])) {
                        $delete->delcartproadmin($_GET['delcartpro'],$_GET['customer']);
                    }
                    if (isset($_GET['delcustomernotification'])) {
                            $delete->removenotification($_GET['delcustomernotification']);
                          }
                        $foodview = $select->selectcustomertable();
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      <td><?php echo $row['customer_fname']." ".$row['customer_lname']; ?></td>
                      <td><?php echo $row['customer_email']; ?></td>
                      <td><?php echo $row['customer_phone']; ?></td>
                      <td><?php echo $row['customer_password']; ?></td>
                      <td><?php echo $row['customer_gender']; ?></td>
                      <td><?php echo $row['creation']; ?></td>
                      <td><img style="height: 50px; width: 50px;" src="../<?php echo $row['customer_image']; ?>"></td>
                      <td><a href="?customer=<?php echo $customerid = $row['customer_id'];?>">checkorder(
                        <?php 
                         $checknotifiation = $select->notificationcheck($customerid);
                         if ($checknotifiation) {
                       
                          while ($noti = $checknotifiation->fetch_assoc()) {
                            echo $noti['notification'];
                        


                         ?>
                         )



                      </a><!-- ||<a href="?delcustomernotification=<?php //echo $noti['notification_id'] ?>">checkout</a> --></td>
                     
                    </tr>
               <?php   }
                        }} } ?>
                    
                 
                  </tbody>
                </table>
              </div>
             <div class="row">

                            <div class="woocommerce">
                         <!--    <form method="post" action=""> -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatepr'])) {
                                         $updata =  $insert->updatecarts($_POST);
                                           }
                                           if (isset($_GET['store'])) {
                                         $datastore =  $insert->datastore($_GET['store'],$_GET['customer'],$_GET['cartid']);
                                           }

                                           if (isset($datastore)) {
                                             echo $datastore;
                                           }
                                           if (isset($_GET['customer'])) {
                                             
                                         
                                            $cartview = $select->productviewatcartfinaladmin($_GET['customer']);
                                    if ($cartview) {
                                            $totals =0;
                                        while ($row = $cartview->fetch_assoc()) {

                                        ?>
                                        
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="?delcartpro=<?php echo $row['cart_id']; ?>&?customer=<?php echo $_GET['customer']; ?>">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../<?php echo $row['image']; ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo $row['title']; ?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?php echo $price = $row['price']; ?> Taka</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                        <form method="post" action="">
                                                    <input style="width: 50px;" type="number" name="quantity" size="4" class="input-text qty text" title="Qty" value="<?php echo $quantity = $row['quantity']; ?>" min="1" step="1">
                                                    <input type="hidden" value="<?php echo $row['cart_id']; ?>" name="cart_id">
                                                  
                                                    <input type="submit" name="updatepr" value="UP">
                                                </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount"><?php echo $total = $price*$quantity; 

                                                $totals += $total; ?> Taka</span> 
                                            </td>
                                            <td>
                                              <a href="?customer=<?php echo $_GET['customer'] ?>&store=<?php echo $row['pro_id']; ?>&cartid=<?php echo $row['cart_id']; ?>">storedata</a>
                                            </td>

                                        </tr><?php } }  }else{} ?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                              
                                               
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                         

                            <div class="cart-collaterals">


                          
                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <tbody>
                                        <tr>
                                            <th>Order Total</th>
                                            <td><span class="amount"><?php echo $totals; ?>Taka</span></td>
                                        </tr>

                                        <tr>
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                <!--         <tr>
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">£15.00</span></strong> </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            </div>


                           
 
                            </div>
                        </div> 
                    </div>
                </div>