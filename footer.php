  <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Pet<span>Corner</span></h2>
                        <p>LAt Katabon Online we pride ourselves on offering friendly service, the best in pet nutrition and the widest range of pet accessories at affordable prices. As pet owners and animal lovers ourselves, we have the welfare of our furred and feathered friends in mind when selecting products for our stores.</p>
                        <div class="footer-social">
                            <?php $foodview = $select->viewallsocialID(1);
                                while ($row = $foodview->fetch_assoc()) { ?>
                            <a href="<?php echo $row['social_link'] ?>" target="_blank"><i class="fa fa-facebook"></i></a> <?php } ?>
                            <?php $foodview = $select->viewallsocialID(2);
                                while ($row = $foodview->fetch_assoc()) { ?>
                            <a href="<?php echo $row['social_link'] ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
                            <?php $foodview = $select->viewallsocialID(4);
                                while ($row = $foodview->fetch_assoc()) { ?>
                            <a href="<?php echo $row['social_link'] ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php } ?>
                            <?php $foodview = $select->viewallsocialID(3);
                                while ($row = $foodview->fetch_assoc()) { ?>
                            <a href="<?php echo $row['social_link'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php } ?>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="profile.php">My account</a></li>
                            <li><a href="process.php">Order history</a></li>
                            
                            <li><a href="index.php">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                              <?php
                                      $foodview = $select->selectallcat();
                                    if ($foodview) {
                                        while ($row = $foodview->fetch_assoc()) {
                                                        
                                  ?>
                            <li><a href="#"><?php echo $row['cat_name'] ?></a></li>
                        <?php }} ?>
                             
                        
                        </ul>                        
                    </div>
                </div>
                
               <!--  <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; <?php echo date('Y'); ?> All Rights Reserved.<!--  <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a> --></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
  </body>
</html>