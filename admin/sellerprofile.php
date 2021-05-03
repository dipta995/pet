<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
       

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Seller Profiles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>image</th>
           
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                        $foodview = $select->selectsellertables();
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      <td><?php echo $row['seller_name']; ?></td>
                      <td><?php echo $row['seller_email']; ?></td>
                      <td><?php echo $row['seller_phone']; ?></td>
                       
                       
                       
                      <td><img style="height: 50px; width: 50px;" src="../<?php echo $row['seller_image']; ?>"></td>
                      <td>
         
                        <a href="product.php?customer=<?php echo $row['seller_id'];?>">Check product</a>



                      </td>
                     
                    </tr>
               <?php } } ?>
                    
                 
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