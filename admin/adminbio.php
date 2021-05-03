<?php 
include 'header.php';
 
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$insert->adminprofileUpdate($_POST,$_FILES,$seller_id);
}
 
?>
<div class="container-fluid">
           <div class="row">
            
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update Your Profile!</h1>
                  </div>

 
              <?php 
           
                $viewdata = $select->viewadminprofileforup($seller_id);
                if ($viewdata) {
                  while ($res = $viewdata->fetch_assoc()) {
                ?>
                <form method="post" action="" class="user" enctype="multipart/form-data">
                    
             
                    <div class="form-group">
                      <input type="title" name="seller_name" class="form-control form-control-user" value="<?php echo $res['admin_name']; ?>">
                    </div>
                    <div class="form-group">
                      <input type="text" readonly name="seller_email" class="form-control form-control-user"  value="<?php echo $res['admin_email']; ?>">
                    </div>
                    <div class="form-group">
                      <input type="text" name="seller_phone" class="form-control form-control-user"  value="<?php echo $res['admin_password']; ?>">
                    </div>
                   <div class="form-group">
                      <input type="file" name="seller_image" class="form-control form-control-user">
                      <img style="width: 100px; height: 100px;" src="../<?php echo $res['admin_image']; ?>">
                    </div>
  


                    <div class="row">
                      <div class="col-sm-4">
                     
                    <input class="btn btn-primary btn-user btn-block" type="submit" name="update" value="Update">
                      </div>
                    </div>
                    
                    <hr>
                  </form>
                
              <?php } } ?>
                  
           
                  
                </div>
              </div>
            </div>

          <!-- Page Heading -->
       
      

          <!-- DataTales Example -->
 

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include 'footer.php'; ?>