<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">
   
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Creat a categories!</h1>
                  </div>
         

                  <div class="row">
                    <div class="col-md-6">
                               <?php   
                  if($_SERVER['REQUEST_METHOD']=='POST'){
                    $getmsg = $insert->updatesocial($_POST);
                  }
                  if (isset($getmsg)) {
                    echo $getmsg;
                  }
                  if (isset($_GET['sid'])) {
                       $foodview = $select->viewallsocialID($_GET['sid']);
                     
                          while ($row = $foodview->fetch_assoc()) {
                            
                   
                  ?>
                       <form method="post" action="">
                    <div class="form-group">
                      <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                       <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="social_name" value="<?php echo $row['social_name'] ?>">

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="social_link" value="<?php echo $row['social_link'] ?>">
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-4">
                     
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="cat" value=" Create Cat">
                    
                      </div>
                   
                      
                    </div>
                    
                    <hr>
                    
                  
                  </form>
                <?php }} ?>
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
        <h1 class="h3 mb-2 text-gray-800">PET SUB-CATEGORIES</h1>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Social Name</th>
                      <th>link</th>
                       
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                        $foodview = $select->viewallsocial();
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      
                      <td><?php echo $row['social_name']; ?></td>
                      <td><?php echo $row['social_link']; ?></td>
                       
                       
                      <td><a href="?sid=<?php echo $row['id'];?>">Edit</a></td>
                     
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