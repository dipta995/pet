<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">
   
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Creat a categories!</h1>
                    <?php
                  if (isset($_GET['removecat'])) {
                    echo $delete->removecat($_GET['removecat']);
                  }
                  if (isset($_GET['removesub'])) {
                    echo $delete->removesub($_GET['removesub']);
                  }
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['cat'])){
                    echo $insert->catinsert($_POST);
                  }
                  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sub'])){
                    echo $insert->subinsert($_POST);
                  }
                  ?>
                  </div>
                  

                  <div class="row">
                    <div class="col-md-6">
                       <form method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="cat_name" placeholder="Enter Categorie...">
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-4">
                     
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="cat" value=" Create Cat">
                    
                      </div>
                   
                      
                    </div>
                    
                    <hr>
                    
                  
                  </form>
                    </div>
                    <div class="col-md-6">
                       <form method="post" action="">
                    <div class="form-group">

                        <select name="cat_id" class="form-control form-control-user">
                          <option>--CHOOSE--</option>
                          <?php
                            $cat = $select->selectallcat();
                             while ($rows = $cat->fetch_assoc()) {
                          ?>
                          <option value="<?php echo $rows['cat_id']; ?>"><?php echo $rows['cat_name']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="sub_name" placeholder="Enter SubCategorie...">
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-4">
                     
                    
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="sub" value=" Create Subcat">
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
                       
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                        $foodview = $select->selectallcat();
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      
                      <td><?php echo $row['cat_name']; ?></td>
                       
                       
                      <td><a href="?removecat=<?php echo $row['cat_id'];?>">Remove</a></td>
                     
                    </tr>
               <?php } } ?>
                    
                 
                  </tbody>
                </table>
              </div>
            </div> 
            <div class="card-body">
        <h1 class="h3 mb-2 text-gray-800">PET SUB-CATEGORIES</h1>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>cat</th>
                      <th>Sub</th>
                       
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php
                        $foodview = $select->selectallsubjoin();
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      
                      <td><?php echo $row['cat_name']; ?></td>
                      <td><?php echo $row['sub_name']; ?></td>
                       
                       
                      <td><a href="?removesub=<?php echo $row['sub_id'];?>">Remove</a></td>
                     
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