<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Customers</h1>
           </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
           
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
                      <th>password</th>
                      <th>Gender</th>
                      <th>Creation</th>
                      <th>Photo</th>
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                         if (isset($_GET['removecustomer'])) {
                    echo $delete->customerremove($_GET['removecustomer']);
                  }
                        $foodview = $select->selectcustomertables();
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      <td><?php echo $row['customer_fname']." ".$row['customer_lname']; ?></td>
                      <td><?php echo $row['customer_email']; ?></td>
                       <?php if ($flag==0 || $flag==1 ) { ?>
                      <td><?php echo $row['customer_phone']; ?></td>
                        <?php } ?>
                      <td><?php echo $row['customer_password']; ?></td>
                      <td><?php echo $row['customer_gender']; ?></td>
                      <td><?php echo $row['creation']; ?></td>
                      <td><img style="height: 50px; width: 50px;" src="../<?php echo $row['customer_image']; ?>"></td>
                      <?php if ($flag==0) { ?>
               
                      <td><a href="?removecustomer=<?php echo $row['customer_id'];?>">Remove</a></td>       
                     <?php } ?>
                     
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