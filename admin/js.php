
<?php
   include_once '../logicfiles/SelectClass.php';
  $select = new SelectClass();
 
 $pet_id=$_POST["pet_id"];
 
$cat = $select->selectallsubcat($pet_id);
                        while ($row = $cat->fetch_assoc()) {
                          echo '<option value='.$row['sub_id'].'>'.$row['sub_name'].'</option>';
 }

 
  
?>