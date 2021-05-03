<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">
   
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Creat New Admin!</h1>
                  </div>
                  <?php
                  if (isset($_GET['removead'])) {
                    echo $delete->adminremove($_GET['removead']);
                  }
             
                  if($_SERVER['REQUEST_METHOD']=='POST'){
                    $insert->createadmin($_POST);
                  }
         
                  ?>

                  <div class="row">
          <style type="text/css">
            .admins{
              padding: 10px;
            }
          </style>
                    <div class="col-md-6">
                       <form method="post" action="">
                    <div class="form-group">
                      <div class="admins">
                       <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="admin_name" placeholder="Enter name...">
                       </div>
                       <div class="admins">
                       <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="admin_email" placeholder="Enter Email...">
                       </div>
                       <div class="admins">
                       <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="admin_password" placeholder="Enter Password">
                       </div>
                       <div class="admins">
                        <select name="flag" class="form-control form-control-user">
                          <option >--CHOOSE--</option>
                  
                          <option value="1">Moderator</option>
                          <option value="2">Editor</option>
                   
                        </select>
                        </div>
                    </div>
      
                    
                    <div class="row">
                      <div class="col-sm-4">
                     
                    
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="sub" value=" Create New Admin">
                      </div>
                   
                      
                    </div>
                    
                    <hr>
                    
                  
                  </form>
                    </div>
                  </div>
               
                  
                </div>
              </div>
            </div>

        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Pet categories</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>image</th>
                       
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                        $foodview = $select->selectalladmin();
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      
                      <td><?php echo $row['admin_name']; ?></td>
                      <td><?php echo $row['admin_email']; ?></td>
                      <td> <img style="height: 60px; width: 50px;" src="../<?php echo $row['admin_image']; ?>"> </td>

                       
                       
                      <td><a href="?removead=<?php echo $row['admin_id'];?>">Remove</a></td>
                 
                     
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