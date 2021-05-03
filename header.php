  <?php
  include_once 'logicfiles/SelectClass.php';
  include_once 'logicfiles/InsertClass.php';
  include_once 'logicfiles/DeleteClass.php';
  include_once 'logicfiles/Login.php';
  $select = new SelectClass();
  $insert = new InsertClass();
  $delete = new DeleteClass();
  include_once 'logicfiles/SessionClass.php';
  Session::checkSession();
  //$lg = new Login();
 
  //$browser_id = session_id();
  $customer_id = Session::get('customer_id');
  $firstname = Session::get('customer_fname');
  $cimage = Session::get('customer_image');
  
  $browser_id = session_id();
  $customer_id = Session::get('customer_id');


  $farmer_id = Session::get('farmer_id');
  $productcount = "";
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Corner</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

 
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
              <style type="text/css">
                .searchform{
                  margin-top: 15px;

                }
                .searchform input{
                  width: 400px;
                  padding: 10px;
                  border-radius: 10px;
                  background-color: ghostwhite;
                  border: 1px solid #b1b1b9;
                  color: #103479;
                  font-size: 18px;

                }
                .btn-search{
                  padding: 10px;
                  background-color: #3a5982;
                  width: 88px;
                  color: #fff;
                  border: 2px;
                  border-radius: 8px;
                  font-size: 18px;
                  font-weight: bold; 
                }
              </style>
              <div class="col-md-2"></div>
                <div class="col-md-6">
                   <form action="search.php" method="get" class="searchform">
                     <input type="text" name="searchkey">
                     <button class="btn-search">search</button>
                   </form>
                </div>
                  
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                 <a data-hover="dropdown" class="dropdown-toggle" href="#"></a>
                                
                            </li>
                     <?php
                    if (isset($_GET['action']) && $_GET['action']== 'logout') {
                        Session::destroy();
                    }

                    if (Session::get('login')==true) {
                  
                    
                    ?>
                <img style="width: 50px; height: 50px;" src="<?php echo $cimage; ?>">
                <?php echo $firstname;?>
            
                            <li class="dropdown dropdown-small">

                                <a data-hover="dropdown" class="dropdown-toggle" href="?action=logout">Logout</a>
                              <?php }else{
                               ?>
                               <div style="height: 50px; font-size: 20px;">
                                 
                               <i class="fa fa-male" aria-hidden="true"></i>

                                 <a data-hover="dropdown" class="dropdown-toggle" href="login.php">Login </a> <?php } ?>
                               </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img style="width: 70px; height: 70px;" src="img/logo1.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart<span class="cart-amunt">
                          
                            
                          </span> <i class="fa fa-shopping-cart"></i> <span class="product-count">
                          <?php 
                          if (empty($customer_id)) {
                            echo '0';
                          }else{
                          $checkintotal = $select->productviewatcart($customer_id);
                          echo $total_rows = mysqli_num_rows($checkintotal); }

                           ?>
                        </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop page</a></li>
                        
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="about.php">About us</a></li>
                                    <?php
                                      $foodview = $select->selectallcat();
                                    if ($foodview) {
                                        while ($row = $foodview->fetch_assoc()) {
                                                        
                                  ?>
                        <li>
                            <a data-toggle="dropdown" dclass="dropdown-toggle" href="#"><span class="key"><?php echo $row['cat_name']; ?><?php  $row['cat_id']; ?> </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                 <?php
                                      $fv = $select->selectallsubcat($row['cat_id']);
                                    if ($fv) {
                                        foreach ($fv as $sub) {
                                                    
                                  ?>
                                    <li><a href="shop.php?shopid=<?php echo $sub['sub_id']; ?>"><?php echo $sub['sub_name']; ?></a></li>
                                   <?php  } } ?>
                                </ul>

                      </li>
                                <?php  } } ?>
                                 <li><a href="admin/register.php">Sell Your Product</a></li>
 
                        
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->