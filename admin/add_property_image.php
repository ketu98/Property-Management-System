<?php
session_start(); 
include('include/header.php');
include('include/config.php');

/*$target_dir="images/property/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));*/
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image1"]["tmp_name"]);
  if($check !== false) {
    $file=$_FILES['image1']['name'];
    $file1=$_FILES['image2']['name'];
    $file2=$_FILES['image3']['name'];
    $file3=$_FILES['image4']['name'];
    $owner=$_POST['owner'];
    $type=$_POST['type'];
    $id=$_POST['id'];
    
    $query="update images set image1='$file' where (owner='$owner' and type='$type')";  
    mysqli_query($con,$query);
    $query="update images set image2='$file1' where (owner='$owner' and type='$type')";  
    mysqli_query($con,$query);
    $query="update images set image3='$file2' where (owner='$owner' and type='$type')";  
    mysqli_query($con,$query);
    $query="update images set image4='$file3' where (owner='$owner' and type='$type')";  
    mysqli_query($con,$query);
    $query="update images set proid='$id' where (owner='$owner' and type='$type')";  
    mysqli_query($con,$query);
    
    
    

    move_uploaded_file($_FILES['image1']['tmp_name'],"images/property/".$_FILES['image1']['name']); 
    move_uploaded_file($_FILES['image2']['tmp_name'],"images/property/".$_FILES['image2']['name']); 
    move_uploaded_file($_FILES['image3']['tmp_name'],"images/property/".$_FILES['image3']['name']); 
    move_uploaded_file($_FILES['image4']['tmp_name'],"images/property/".$_FILES['image4']['name']); 

    $msg='<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Image Upload  successfuly.
    </div>';       
    
   
    $uploadOk = 1;
  } 
  else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

/*if(isset($submit))
{

  $file=$_FILES['image1']['name'];
  $file1=$_FILES['image2']['name'];
  $file2=$_FILES['image3']['name'];
  $file3=$_FILES['image4']['name'];
  
  $query="insert into images(image1,image2,image3,image4) values('','$file','$file1','$file2','$file3') where images.owner=pro.owner and images.type=pro.type";  
  mysqli_query($con,$query);
  move_uploaded_file($_FILES['image1']['tmp_name'],"images/property_image/".$_FILES['image1']['name']); 
  move_uploaded_file($_FILES['image2']['tmp_name'],"images/property_image/".$_FILES['image2']['name']); 
  move_uploaded_file($_FILES['image3']['tmp_name'],"images/property_image/".$_FILES['image3']['name']); 
  move_uploaded_file($_FILES['image4']['tmp_name'],"images/property_image/".$_FILES['image4']['name']); 

   $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Image Upload  successfuly.
  </div>';       
}*/

?>  
    <!-- Header -->
    
    <section>
       
       
       <!-- Left Sidebar -->
<?php @include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Add Property
                                
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data" action ="add_property_image.php">
                                   --Select Id--
                                        <select name="id">
                                        <option selected="selected">Choose one</option>
                                            <?php
                                            $sel=mysqli_query($con,"select * from pro");
                                            while($res=$sel->fetch_assoc())
                                            {
                                            ?>

                                            <option value="<?php echo $res['id'];?>"><?php echo $res['id'];?></option>  
                                           
                                           <?php  }  ?>
                                            

                                       </select>
                                       --Select Owner--
                                        <select name="owner">
                                            <option value="" selected="selected">Choose one</option>
                                            <?php
                                            $sel=mysqli_query($con,"select * from pro");
                                            while($res=$sel->fetch_assoc())
                                            {
                                            ?>

                                            <option value="<?php echo $res['owner'];?>"><?php echo $res['owner'];?></option>  
                                           
                                           <?php  }  ?>
                                            

                                       </select>
                                      --Select Type--
                                        <select name="type">
                                            <option selected="selected">Choose one</option>
                                            <?php
                                            $sel=mysqli_query($con,"select * from pro");
                                            while($res=$sel->fetch_assoc())
                                            {
                                            ?>

                                            <option value="<?php echo $res['type'];?>"><?php echo $res['type'];?></option>  
                                           
                                           <?php  }  ?>
                                            

                                       </select>
                            
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                        <div class="dz-message">
                                   
                                            <h3>Click to Image upload.</h3>
                                    
                                        </div>
                                        <div>
                                            <input required type="file" name="image1" />
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        
                                        <div class="dz-message">
                                    
                                            <h3>Click to Image upload.</h3>
                                        
                                        </div>
                                        <div>
                                            <input required type="file" name="image2" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        
                                        <div class="dz-message">
                                    
                                            <h3>Click to Image upload.</h3>
                                        
                                        </div>
                                        <div>
                                            <input required type="file" name="image3" />
                                        </div>
                                
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        
                                        <div class="dz-message">
                                    
                                            <h3>Click to Image upload.</h3>
                                        
                                        </div>
                                        <div>
                                            <input required name="image4" type="file"  />
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">     
                                            <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                                          
                                            ?>
            <?php include'include/footer.php';?> -->
            <!-- Select Plugin Js -->
 
