<?php include 'header.php'; ?>
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img style="height: 280px;" src="img/slide/dog2.jpg" alt="Slide">
						<div class="caption-group">
							 
						</div>
					</li>
					<li><img style="height: 280px;" src="img/slide/bird1.jpg" alt="Slide">
						<div class="caption-group">
						 
						</div>
					</li>
					<li><img style="height: 280px;" src="img/slide/dog3.jpg" alt="Slide">
						<div class="caption-group">
						 
						</div>
					</li>
                    <li><img style="height: 280px;" src="img/slide/turtle.jpg" alt="Slide">
                        <div class="caption-group">
                         
                        </div>
                    </li>
                    
                    <li><img style="height: 280px;" src="img/slide/fish2.jpg" alt="Slide">
                        <div class="caption-group">
                         
                        </div>
                    </li>
                    
                    <li><img style="height: 280px;" src="img/slide/bird2.jpg" alt="Slide">
                        <div class="caption-group">
                         
                        </div>
                    </li>
                    <li><img style="height: 280px;" src="img/slide/cat1.jpg" alt="Slide">
                        <div class="caption-group">
                         
                        </div>
                    </li>
                    <li><img style="height: 280px;" src="img/slide/fish1.jpg" alt="Slide">
                        <div class="caption-group">
                         
                        </div>
                    </li>
                    <li><img style="height: 280px;" src="img/slide/dog1.jpg" alt="Slide">
                        <div class="caption-group">
                         
                        </div>
                    </li>
                    <li><img style="height: 280px;" src="img/slide/bird3.jpg" alt="Slide">
                        <div class="caption-group">
                         
                        </div>
                    </li>
                    
				<!-- 	<li><img style="height: 280px;" src="img/h4-slide4.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								<span class="primary"> <strong>persian dog </strong></span>
							</h2>
							<h4 class="caption subtitle">3000 taka</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li> -->
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            <?php
                            $petslist = $select->selectproductlimit();
                                    if ($petslist) {
                                        while ($row = $petslist->fetch_assoc()) {
                             ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img  style="height:250px; width:210px;" src="<?php echo $row['image'];?>" alt="">
                                    <div class="product-hover">
                                      
                                        <a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><?php echo $row['title'];?></a></h2>
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
                                    <ins><?php echo $row['price'];?> Taka</ins> <!-- <del>$100.00</del> -->
                                </div> 
                            </div>
                            <?php }} ?>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
   <!--  <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                   <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Most sold</h2>
                        <a href="shopone.php" class="wid-view-more">View All</a>

                        <?php
                        $recentview = $select->viewmostsold();
                                    if ($recentview) {
                                        while ($row = $recentview->fetch_assoc()) {
                        ?>
                        <div class="single-wid-product">
                            <a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><img src="<?php echo $row['image']; ?>" alt="" class="product-thumb"></a>
                             <h2><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><?php echo $row['title']; ?></a></h2>
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
                            <div class="product-wid-price">
                                <ins><?php echo $row['price']; ?> Taka</ins>
                            </div>                            
                        </div>
                    <?php } }  ?>
                        
                         
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <a href="shoptwo.php" class="wid-view-more">View All</a>

                        <?php
                        $recentview = $select->selerecentview($customer_id);
                                    if ($recentview) {
                                        while ($row = $recentview->fetch_assoc()) {
                        ?>
                        <div class="single-wid-product">
                            <a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><img src="<?php echo $row['image']; ?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><?php echo $row['title']; ?></a></h2>
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
                            <div class="product-wid-price">
                                <ins><?php echo $row['price']; ?>Taka</ins>
                            </div>                            
                        </div>
                    <?php } }  ?>
                        
                         
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        <a href="shop.php" class="wid-view-more">View All</a>

                        <?php
                        $recentview = $select->newupproduct();
                                    if ($recentview) {
                                        while ($row = $recentview->fetch_assoc()) {
                        ?>
                        <div class="single-wid-product">
                            <a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><img src="<?php echo $row['image']; ?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?productid=<?php echo $row['pro_id'];?>&catid=<?php echo $row['cat_id'];?>"><?php echo $row['title']; ?></a></h2>
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
                            <div class="product-wid-price">
                                <ins><?php echo $row['price']; ?> Taka</ins> 
                            </div>                            
                        </div>
                    <?php } }  ?>
                        
                         
                    </div>
                </div>
                 
            </div>
        </div>
    </div> <!-- End product widget area -->
    
  <?php include 'footer.php'; ?>