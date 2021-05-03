<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Products Details</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Title</th>
                      <th>Image</th>
                      <th>Ratting</th>
                     
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                        $petslist = $select->viewproductbyid($_GET['proid']);
                                    if ($petslist) {
                                        while ($row = $petslist->fetch_assoc()) {
                                                        
                     ?>
                    <tr>
                      
                     
                      <td><?php echo $row['title']; ?></td>
                       
                      <td><img style="height: 50px; width: 50px;" src="../<?php echo $row['image']; ?>"></td>
                     
                      <td>
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
                      </td>
                     
                    </tr>
               <?php } } ?>
                    
                 
                  </tbody>
                </table>
          
                
      


               
                     
                     
                  </div>
             
                   
                 
    


                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Email</th>
                      <th>Comment</th>
                     
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>

                         <?php 

                  $getcmd = $select->commentview($_GET['proid']);
                                    if ($getcmd) {
                                        while ($getcom = $getcmd->fetch_assoc()) {
                   ?> 
                    <tr>

                  
                     
                 
                 
                      <td>  <?php echo $getcom['name']; ?> </td>
                      <td> <?php echo $getcom['email']; ?></td>
                      <td>     <?php echo $getcom['review']; ?></td>
                    </tr>
                                <?php }} ?>

                  </tbody>
                </table>







                
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include 'footer.php'; ?>