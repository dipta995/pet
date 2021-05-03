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
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
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
                <style type="text/css">
                    .woocommerce input[type=email], 
    input[type=text], 
    input[type=password] {
                        width: 400px;
                        border-radius: 5px;
                    }
                </style>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                         <!--    <form method="post" action=""> -->
                                <table cellspacing="0" class="shop_table cart">
                                  
                                        <?php

                                        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatecustomer'])) {
                                          $update = $insert->Updatecustomer($_POST,$_FILES,$customer_id);
                                        }
                                            $cartview = $select->customerprofile($customer_id);
                                    if ($cartview) {
                                            $totals =0;
                                        while ($row = $cartview->fetch_assoc()) {

                                        if (isset($_GET['editmypro']) == $customer_id) { ?>
                                            <tr class="cart_item">
                                                <form method="post" action="" enctype= multipart/form-data>
                                                    <label>First name</label><br>
                                             <input type="text" name="customer_fname" value="<?php echo $row['customer_fname'] ?>"><br>

                                            <label>Last name</label><br>
                                                <input type="text" name="customer_lname" value="<?php echo $row['customer_lname'] ?>"><br>
                                                <label>Email</label><br>
                                       
 
                                                <input type="text" name="customer_email" value="<?php echo $row['customer_email'] ?>"><br>
                                          
                                                <input type="hidden" name="customer_password" value="<?php echo $row['customer_password'] ?>"><br>
                                           <label>Phone </label><br>
                                     
                                                <input type="text" name="customer_phone" value="<?php echo $row['customer_phone'] ?>"><br> 
                                                <label>Upload Image</label><br>

                                                <input type="file" name="image" value="<?php echo $row['customer_image'] ?>"><br>
                                               
                                                    <img style="height: 100px; width:80px;" src="<?php echo $row['customer_image'] ?>"><br>
                                               
                                           <label>Gender</label><br>
                                                <?php if($row['customer_gender']=='Male') { ?>
                                                    <input type="radio" checked id="male" name="customer_gender" value="Male">
                                                    <label for="male">Male</label><br>
                                                    <input type="radio"  id="female" name="customer_gender" value="Female">
                                                <label for="female">Female</label><br>

                                               


    <?php }elseif($row['customer_gender']=='Female'){?>
        <input type="radio" id="male" name="customer_gender" value="Male">
        <label style="margin-left: 20px;" for="male">Male</label><br>
        <input type="radio" checked id="female" name="customer_gender" value="Female">
    <label for="female">Female</label><br>

                                               
                                                <?php } ?>
                                                  
                                                 <button class="btn btn-success" name="updatecustomer">Update profile</button>
                                                 </form>
                                                
                                             </td>
                                      <?php }elseif ($customer_id) { ?>
                                          <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Name</th>
                                            <th class="product-price">Email</th>
                                            <th class="product-quantity">Phone</th>
                                            <th class="product-subtotal">Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                          <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="?editmypro=<?php echo $customer_id; ?>">Edit</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo $row['customer_image']; ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo $row['customer_fname']." ".$row['customer_lname']; ?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?php echo $price = $row['customer_email']; ?></span> 
                                            </td>
                                            <td class="product-price">
                                                <span class="amount"><?php echo $price = $row['customer_phone']; ?></span> 
                                            </td>
                                            <td class="product-price">
                                                <span class="amount"><?php echo $price = $row['customer_gender']; ?></span> 
                                             </td>
                                         
                                      <?php }else{} ?>

                                            
 
                                        </tr><?php } } ?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                              
                                               
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                         

                            <div class="cart-collaterals">


                          
                       

                           
 
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


      <?php include 'footer.php'; ?>