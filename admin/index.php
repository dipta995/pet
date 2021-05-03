<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

           
         


          <!-- Content Row -->

  

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">


<div class="row">
  <?php if ($admin == 'admin') {
        ?>
 <!-- Color System -->
              
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Fire Service
                      <div class="text-white-50 small">Phone:123456789</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Ambulence
                      <div class="text-white-50 small">Phone:123456789</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Doctor
                      <div class="text-white-50 small">Phone:123456789</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Police
                      <div class="text-white-50 small">Phone:123456789</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Food
                      <div class="text-white-50 small">Phone:123456789</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>

      <?php }else{ ?>

   
             
               
            
                    <?php
                        $foodview = $select->selectproductfrseller($seller_id);
                      if ($foodview) {
                    
                          while ($row = $foodview->fetch_assoc()) {
                       
                                                        
                     ?>
                          <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div style="height: 250px;" class="card-body">
                      <a href="singleproductview.php?proid=<?php echo $row['pro_id']; ?>">
                      <img style="height: 100px; width: 80px;" src="../<?php echo $row['image']; ?>">
                      <h6 style="color: #fff;"><?php echo $row['title']; ?></h6>
                      <p style="color: #fff;font-size: 12px;">TK: <?php echo $row['price']; ?></p></a>
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
                  </div>
                </div>
                      
                     
                       
                
               <?php } } ?>
                    
                 
                  </tbody>
                </table>
              </div>
            </div> 
          </div>







<?php } ?>










             
                 
               
            </div>

            </div>

           
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include 'footer.php'; ?>