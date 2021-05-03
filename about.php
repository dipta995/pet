<?php include 'header.php'; 
//Session::checkSessionind($redirect_link_var);
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
                                <ins><?php echo $row['price']; ?>Taka</ins>  
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
                    <style type="">
                        .profile_area{
                            height: auto;width: auto; margin: 0 auto;
                        }
                        .profile_head{
                            height: 300px;
                            width: 400px;
                            margin: 0 auto;

                        }
                       
                        .profile_body ul li{
                            list-style: none;
                            text-align: center;
                            padding: 2px;

                        }
                        .profile_footer{
                            margin-top: 30px;
                            float: left;
                        }
                    </style>
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="profile_area">
                                <div class="profile_head">
                                <img src="img/ceo.jpg">
                                
                            </div>
                            <div class="profile_body">
                                  
                                <!-- <h4>Dipta Dey</h4> -->
                                <ul style="color: #fb0a0a; font-size: 12px; font-weight: 600px;">
                                    <li style="font-size: 18px;  font-weight: 400;">Tanjil Haque</li >
                                    <li >CEO at PET Corner</li>
                                    <li>Bsc AND Msc IN CSE at Stamford Bniversity Bangladesh</li>
                                  
                                </ul>
                                
                            </div>
                            <div class="profile_footer">
                                <h2  style="float: l">About us</h2>
                                <p>At Katabon Online we pride ourselves on offering friendly service, the best in pet nutrition and the widest range of pet accessories at affordable prices. As pet owners and animal lovers ourselves, we have the welfare of our furred and feathered friends in mind when selecting products for our stores.</p>
                                
                            </div>
                            </div>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


      <?php include 'footer.php'; ?>