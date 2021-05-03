<?php include 'header.php'; 
//Session::checkSessionind($redirect_link_var);
 $protocol = $_SERVER['SERVER_PROTOCOL'];
if (strpos($protocol,"HTTPS")) {
   $protocol = "HTTPS://";
}else{
    $protocol = "HTTP://";
}
$redirect_link_var = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $browser_id = session_id();
  $customer_id = Session::get('customer_id');


  $farmer_id = Session::get('farmer_id');
  $productcount = "";



?>
<style type="text/css">
  /* component */

.star-rating {
  border:solid 1px #ccc;
  display:flex;
  flex-direction: row-reverse;
  font-size:1.5em;
  justify-content:space-around;
  padding:0 .2em;
  text-align:center;
  width:5em;
}

.star-rating input {
  display:none;
}

.star-rating label {
  color:#ccc;
  cursor:pointer;
}

.star-rating :checked ~ label {
  color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
  color:#fc0;
}

/* explanation */

article {
  background-color:#ffe;
  box-shadow:0 0 1em 1px rgba(0,0,0,.25);
  color:#006;
  font-family:cursive;
  font-style:italic;
  margin:4em;
  max-width:30em;
  padding:2em;
}

</style>
 <?php
 if (isset($_GET['productid'])) {
     $insert->recentview($_GET['productid'],$customer_id);
 }
 ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <!--  <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div> -->
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                         <?php
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
                        <!-- <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div> -->
                        <?php

                            $petslist = $select->viewproductbyid($_GET['productid']);
                                    if ($petslist) {
                                        while ($row = $petslist->fetch_assoc()) {
                      
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo $row['image'];?>" alt="">
                                    </div>
                                    
                                    <!-- <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div> -->
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $row['title'];?></h2>
                                   
                                    <div class="product-inner-price">
                                        <ins><?php echo $row['price'];?> Taka</ins> <!-- <del>$100.00</del> -->
                                    </div>    
                                    <?php 
                                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['addtocart'])) {
                                        $addcart = $insert->addcart($_POST);
                                    }
                                    ?>
                                    <form action="" method="post" class="cart">
                                        <div class="quantity">
                                            <input type="hidden" value="<?php echo $row['title'];?>" name="title">
                                            <input type="hidden" value="<?php echo $row['image'];?>" name="image">
                                            <input type="hidden" value="<?php echo $row['price'];?>" name="price">
                                            <input type="hidden" value="<?php echo $proid = $row['pro_id'];?>" name="pro_id">
                                            <input type="hidden" value="<?php echo $customer_id;?>" name="customer_id">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" name="addtocart" type="submit">Add to cart</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href=""><?php echo $row['cat_name'];?></a>. <div class="product-wid-rating">
                                <?php  
                                if ($row['rat_hit']!=0 || $row['rat_avg']!=0) {
                                $a = ceil($row['rat_hit']/$row['rat_avg']); ?>
                                <?php 
                                    if ($a==0) {
                                        echo "No ratting";
                                    }elseif($a==1){
                                        echo "<i class='fa fa-star'></i>";  
                                    }elseif($a==2){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==3){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==4){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==5){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }
                                    else{

                                    }
                                }
                                ?>
                             
                            </div> </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p><?php echo $row['details'];?></p>
                                                <?php 
                                                 $getcmd = $select->commentview($_GET['productid']);
                                    if ($getcmd) {
                                        while ($getcom = $getcmd->fetch_assoc()) {
                                                 ?>
                                                <div>
                                                   <hr>
                                                    <h4 style="font-size: 14px; color: green;"><?php echo $getcom['name'] ?></h4>
                                                    <p style="font-size: 12px; margin-top: -5px;"><span style="color: blue; padding-left: -5px;">Comment :</span><?php echo $getcom['review'] ?></p>
                                                       <hr>
                                                </div>
                                            <?php }} ?>
 
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <?php 

                                                   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['reviewins'])) {
                                                          
                                                        
                                                     $addcart = $insert->reviewinsert($_POST,$_GET['productid']);
                                    }
                                                     ?>
                                <form method="post" action="">
                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                <div class="rating-chooser">
                                                        <p>Your rating</p>

                                      <div class="star-rating">
                                  <input type="radio" id="5-stars" name="rathit" value="5" />
                                  <label for="5-stars" class="star">&#9733;</label>
                                  <input type="radio" id="4-stars" name="rathit" value="4" />
                                  <label for="4-stars" class="star">&#9733;</label>
                                  <input type="radio" id="3-stars" name="rathit" value="3" />
                                  <label for="3-stars" class="star">&#9733;</label>
                                  <input type="radio" id="2-stars" name="rathit" value="2" />
                                  <label for="2-stars" class="star">&#9733;</label>
                                  <input type="radio" id="1-star" name="rathit" value="1" />
                                  <label for="1-star" class="star">&#9733;</label>
                                </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>

                                                    <p><input type="submit" name="reviewins" value="Submit"></p>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <?php } } ?>
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                    <?php

                            $petslist = $select->selectrelated($_GET['catid']);
                                    if ($petslist) {
                                        while ($row = $petslist->fetch_assoc()) {
                      
                        ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img style="height:250px; width:210px;"  src="<?php echo $row['image'];?>" alt="">
                                        <div class="product-hover">
                           
                                             
                                            <a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $_GET['catid'] ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href=""><?php echo $row['title'];?></a></h2>
                                     <div class="product-wid-rating">
                                <?php  
                                if ($row['rat_hit']!=0 || $row['rat_avg']!=0) {
                                $a = ceil($row['rat_hit']/$row['rat_avg']); ?>
                                <?php 
                                    if ($a==0) {
                                        echo "No ratting";
                                    }elseif($a==1){
                                        echo "<i class='fa fa-star'></i>";  
                                    }elseif($a==2){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==3){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==4){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }elseif($a==5){
                                        echo "<i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>";  
                                    }
                                    else{

                                    }
                                }
                                ?>
                             
                            </div>
                                    <div class="product-carousel-price">
                                        <ins><?php echo $row['price'] ?> Taka</ins> <!-- <del>$100.00</del> -->
                                    </div> 
                                </div>
                            <?php }} ?>
                                
                                
                               
                                                            
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

  <?php include 'footer.php'; ?>