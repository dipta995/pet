<?php 
include 'header.php';

?>
<div class="container-fluid">
           <div class="row">
            
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Upload Your Product!</h1>
                    <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['pet'])) {
  echo $insert->prodctinsert($_POST,$_FILES,0);
}
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])) {
 echo  $insert->prodctUpdate($_POST,$_FILES,$_GET['updatedata'],0);
}
if (isset($_GET['removedata'])) {
  $delete->removeproduct($_GET['removedata']);
}
                     ?>
                  </div>

 
              <?php 
              if (isset($_GET['updatedata'])) {
                $viewdata = $select->viewproductadminbyid($_GET['updatedata']);
                if ($viewdata) {
                  while ($res = $viewdata->fetch_assoc()) {
                ?>
                <form method="post" action="" class="user" enctype="multipart/form-data">
                    <div class="form-group">
                      <select style="width: 100%;" class="form-control-user" name="cat_id">
                        <option value="<?php echo $res['cat_id']; ?>" ><?php echo $res['cat_name']; ?></option>
                        <?php
                        $cat = $select->selectallcat();
                        while ($row = $cat->fetch_assoc()) {
                          echo '<option value='.$row['cat_id'].'>'.$row['cat_name'].'</option>';} 
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select style="width: 100%;" class="form-control-user" name="sub_id">
                        <option value="<?php echo $res['sub_id']; ?>" ><?php echo $res['sub_name']; ?>
                        <?php
                        $cat = $select->selectallsub();
                        while ($row = $cat->fetch_assoc()) {
                          echo '<option value='.$row['sub_id'].'>'.$row['sub_name'].'</option>';} 
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="title" name="title" class="form-control form-control-user" value="<?php echo $res['title']; ?>">
                    </div>
                    <div class="form-group">
                      <input type="text" name="price" class="form-control form-control-user"  value="<?php echo $res['price']; ?>">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="quantity" class="form-control form-control-user"  value="<?php echo $res['quantity']; ?>">
                    </div>
                   <div class="form-group">
                      <input type="file" name="image" class="form-control form-control-user">
                      <img style="width: 100px; height: 100px;" src="../<?php echo $res['image']; ?>">
                    </div>
                 <div class="form-group">
                      <textarea name="details" class="form-control form-control-user"><?php echo $res['details']; ?></textarea> 
                    </div>


                    <div class="row">
                      <div class="col-sm-4">
                     
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="update" value="Add Pet">
                      </div>
                    </div>
                    
                    <hr>
                  </form>
                
              <?php } } }else{ ?>
                  <form method="post" action="" class="user" enctype="multipart/form-data">
                    <div class="form-group">
                      <select style="width: 100%;" id="pet_id" class="form-control-user" name="cat_id">
                      	<option>--CHOOSE CATEGORY--</option>
                      	<?php
                      	$cat = $select->selectallcat();
                      	while ($row = $cat->fetch_assoc()) {
                      		echo '<option value='.$row['cat_id'].'>'.$row['cat_name'].'</option>';} 
                      	?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select style="width: 100%;" class="form-control-user" id="subpet" name="sub_id">
                        <option>--CHOOSE CATEGORY--</option>
                       
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="title" name="title" class="form-control form-control-user"  placeholder="Pets Title...">
                    </div>
                    <div class="form-group">
                      <input type="text" name="price" class="form-control form-control-user"  placeholder="Price">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="quantity" class="form-control form-control-user"  value="1">
                    </div>
					         <div class="form-group">
                      <input type="file" name="image" class="form-control form-control-user">
                    </div>
					       <div class="form-group">
                      <textarea name="details" class="form-control form-control-user">Write about your pets</textarea> 
                    </div>


                    <div class="row">
                      <div class="col-sm-4">
                     
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="pet" value="Add Pet">
                      </div>
                    </div>
                    
                    <hr>
                    </form>
                <?php } ?>
           
                  
                </div>
              </div>
            </div>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Customers</h1>
      

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
                      <th>Cat Name</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Price</th>
                      <th>Details</th>
                       
                      <th><></th>
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php

                    if (isset($_GET['customer'])) {
                      $foodview = $select->selectproductcustomer($_GET['customer']);
                    }else{

                        $foodview = $select->selectproduct();
                    }
                      if ($foodview) {
                        $a=0;
                          while ($row = $foodview->fetch_assoc()) {
                            $a++;
                                                        
                     ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      
                      
                      <td><?php echo $row['title']; ?></td>
                      <td><img style="height: 100px; width: 80px;" src="../<?php echo $row['image']; ?>"></td>
                      <td><?php echo $row['price']; ?></td>
                      <td><?php echo $row['details']; ?></td>
                       
                       
                      <td><a href="?removedata=<?php echo $row['pro_id'];?>">Remove</a></td>
                      <td><a href="?updatedata=<?php echo $row['pro_id'];?>">Update</a></td>
                     
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