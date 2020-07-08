<?php
@session_start(); 
   include('include/userheader.php');
extract($_REQUEST);
include'include/config.php';
$update=false;
            $owner='';
			$type='';
			$size='';
			$price='';
			$des='';
			$loc='';
            $lat='';
            $lon='';
			$kitchen='';
			$hall='';
			$bedroom='';
			$bathroom='';
			$balcony='';
		
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $mysqli=mysqli_query($con,"select * FROM pro wHERE id=$id");
    if($mysqli){
        $hidden=$id;
        $row=$mysqli->fetch_array();
        $owner=$row['owner'];
        $type=$row['type'];
        $size=$row['size'];
        $price=$row['price'];
        $des=$row['description'];
        $loc=$row['location'];
        $lat=$row['lat'];
		$lon=$row['lon'];
        $kitchen=$row['kitchen'];
        $hall=$row['hall'];
        $bedroom=$row['bedroom'];
        $bathroom=$row['bathroom'];
        $balcony=$row['balcony'];
    }
}
/*if(isset($submit))
{

$file=$_FILES['file']['name'];
  
  $query="insert into pro(owner,type,size,price,description,location,llink,images,kitchen,hall,bedroom,bathroom,balcony) values('','$property_owner','$property_type','$property_type','$lot_size','$price','$description','$add','$location','$file','$kitchen','$hall','$bedroom','$bathroom','$balcony','$propert')";  
  $query2="insert into images(owner,type) values('$property_owner','$property_type')";
  $r=mysqli_query($con,$query);
  $r2=mysqli_query($con,$query2);
  move_uploaded_file($_FILES['file']['tmp_name'],"images/property/".$_FILES['file']['name']); 

if($r)
{
  $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Add successful.
  </div>';    
}
else
{
$msg='<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Add Not successful.
  </div>';

}
        
}*/

?>  
    <!-- Header -->
    
    <section>
       
       <!-- Left Sidebar -->
<?php include('include/usersidebar.php');
?>
        <!-- #END# Left Sidebar -->
        <section class="content">
        <div class="container-fluid">
						<?php
							if(isset($_SESSION['message'])):
						?>
						<div class=alert alert-<?=$_SESSION['msg_type']?>>
						<?php
							echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            
                        ?>
                        <script>alert("SUCCESS!!!Record has been added successfully")</script>;
						</div>
						<?php endif ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Add Property
                            </h2>
                        </div>
						
                        <div class="body">
                            <form method="post" action= "userprocess.php" enctype="multipart/form-data">
                                <input type="hidden" name="hidden" value="<?php echo $hidden; ?>" >
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="property_owner" 
                                                value="<?php echo $owner; ?>" class="form-control">
                                                <label class="form-label">Property Owner</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="property_type" value="<?php echo "$type"; ?>" class="form-control">
                                                <label class="form-label">Property Type</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="lot_size" value="<?php echo $size; ?>" class="form-control">
                                                <label class="form-label">Property Size in sq m</label>
                                            </div>
                                        </div>
                                     </div>
									
                                    
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="price" value="<?php echo $price; ?>" class="form-control">
                                                <label class="form-label">Price in Lakhs</label>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea required name="description" value="<?php echo $des; ?>" class="form-control"></textarea>
                                                <label class="form-label">Description</label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="add" value="<?php echo $loc; ?>" class="form-control">
                                                <label class="form-label">Location</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" required name="lat" value="<?php echo $lat; ?>" class="form-control">
                                                <label class="form-label">Latitude</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $lon; ?>" required name="lon">
                                                <label class="form-label">Longitude</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
										<div class="custom-file">
											<label class="form-label">Add Property Image</label>
											<input required name="file"  type="file" />
                                    
										</div>      
									</div>



                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="kitchen" value="<?php echo $kitchen; ?>" class="form-control">
                                                <label class="form-label">Kitchen</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="hall" value="<?php echo $hall; ?>" class="form-control">
                                                <label class="form-label">Hall</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bedroom" value="<?php echo $bedroom; ?>" class="form-control">
                                                <label class="form-label">Bedroom</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bathroom" value="<?php echo $bathroom; ?>" class="form-control">
                                                <label class="form-label">Bathroom</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="balcony" value="<?php echo $balcony; ?>" class="form-control">
                                                <label class="form-label">Balcony</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">
                                        <?php
                                            if($update==true){
                                        ?>
                                                <input type="submit" name="update" class="btn btn-info btn-lg m-l-15 waves-effect" value="Update"> 
                                            <?php }else{ ?>
                                                <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                                            <?php }?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php include'include/footer.php';?>