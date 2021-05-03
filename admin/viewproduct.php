<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

           
         

            <div class="col-lg-8 mb-4">

            
             <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
              
                      <th>Title</th>
                      <th>Image</th>
                      <th>Price</th>
                      <th>Details</th>
                       
                      <th><></th>
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                       if (isset($_GET['removedata'])) {
                          $delete->removeproduct($_GET['removedata']);
                        }
                        if (isset($_GET['shopid'])) {
                          
                        
                  
                $viewdata = $select->productviewbysubcatown($_GET['shopid'],$seller_id);
                
                  $a=0;
                  while ($row = $viewdata->fetch_assoc()) {
                  $a++;                               
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      <td><a href="singleproductview.php?proid=<?php echo $row['pro_id']; ?>"><?php echo $row['title']; ?></a></td>
                      <td><img style="height: 100px; width: 80px;" src="../<?php echo $row['image']; ?>"></td>
                      <td><?php echo $row['price']; ?></td>
                 
                      <td><?php
                      echo ((strlen($row['details']) > 180) ? substr($row['details'],0,180).'...' : $row['details']);
 ?></td>
                       <td><a href="?removedata=<?php echo $row['pro_id'];?>">Remove</a></td>
                      <td><a href="selpets.php?updatedata=<?php echo $row['pro_id'];?>">Update</a></td>
                     
                    </tr>
               <?php } }?>
                    
                 
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