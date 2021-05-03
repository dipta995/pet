<?php include 'header.php'; 
Session::checkSessionind($redirect_link_var);
?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
              <!--       <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div> -->
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                         <?php

                    if (isset($_GET['delcartpro'])) {
                        $delete->delcartpro($_GET['delcartpro']);
                    }
                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatepr'])) {
                        $updata =  $insert->updatecarts($_POST);
                       }

                            $recentview = $select->randomproductlimit();
                                if ($recentview) {
                                    while ($row = $recentview->fetch_assoc()) {
                        ?>
                        <div class="thubmnail-recent">
                            <img src="<?php echo $row['image']; ?>" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><?php echo $row['title']; ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $row['price']; ?> Taka</ins>  
                            </div>                             
                        </div>
                    <?php } } ?>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                              <?php
                        $recentview = $select->randomproductlimit();
                                    if ($recentview) {
                                        while ($row = $recentview->fetch_assoc()) {
                        ?>
                            <li><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><img style="height: 90px; width: 120px;" src="<?php echo $row['image'];?>"></a></li>
                           
                              <?php } } ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                         <!--    <form method="post" action=""> -->
                                <table cellspacing="0" class="shop_table cart">
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
                                            $cartview = $select->productviewatcart($customer_id);
                                    if ($cartview) {
                                            $totals =0;
                                        while ($row = $cartview->fetch_assoc()) {

                                        ?>


                                        
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="?delcartpro=<?php echo $row['cart_id']; ?>">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo $row['image']; ?>"></a>
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
                                                    <input type="number" name="quantity" size="4" class="input-text qty text" title="Qty" value="<?php echo $quantity = $row['quantity']; ?>" min="0" step="1">
                                                    <input type="hidden" value="<?php echo $row['cart_id']; ?>" name="cart_id">
                                                  
                                                    <input type="submit" name="updatepr" value="UP">
                                                </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount"><?php echo $total = $price*$quantity; 

                                                $totals += $total; ?> Taka</span> 
                                            </td>
                                        </tr><?php } } ?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                              <!--   <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div> -->
                                               <!--  <input type="submit" value="Update Cart" name="update_cart" class="button"> -->
                                                  <?php 
                                                  if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['proceed'])) {
                                                    $insert->checkouttoconfirm($customer_id);
                                                      
                                                  }
                                               if (isset($customer_id)) { ?>
                                                <form method="post" action="">
                                                    
                                                   <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                                </form>
                                               <?php }else{ ?>
                                             <a href="checkout.php" class="checkout-button button alt wc-forward"></a>
                                         <?php } ?>
                                               
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                   <!--          </form> -->

                            <div class="cart-collaterals">


                            <!-- <div class="cross-sells">
                                <h2>You may be interested in...</h2>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>

                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>
                                </ul>
                            </div> -->


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Order Total</th>
                                            <td><span class="amount"><?php echo $totals; ?> Taka</span></td>
                                        </tr>
 
                                    </tbody>
                                </table>
                            </div>


                           <!--  <form method="post" action="#" class="shipping_calculator">
                                <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Calculate Shipping</a></h2>

                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                <p class="form-row form-row-wide">
                                <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                    <option value="">Select District…</option>
                                    <option value="AX">Åland Islands</option>
                                
                                </select>
                                </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="Yoru Address" value="" class="input-text"> </p>
 


                                <p><button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button></p>

                                </section>
                            </form>

 -->
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


      <?php include 'footer.php'; ?>