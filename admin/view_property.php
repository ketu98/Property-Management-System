            <?php
            session_start();
             include('include/header.php');?>
      
    <!-- Header -->
    
    <section>
       
       <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->
        <section class="content">
                    <div class="row clearfix">
                    <?php
							if(isset($_SESSION['message'])):
						?>
						<div class=alert alert-<?=$_SESSION['msg_type']?>">
						<?php
							echo $_SESSION['message'];
							unset($_SESSION['message']);
                        ?>
                        <script>alert("DELETED!!!Record has been deleted successfully")</script>;
						</div>
						<?php endif ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-info" href="add_property.php">Add Property</a>
                            <h2 style="text-align: center;">
                             View Property
                            </h2>
                        </div>
							
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                       <tr>
                                            <th>Sl.No</th>
                                            <th>Type</th>
                                            <th>Bedroom</th>
                                            <th>Kitchen</th>
                                            <th>Hall</th>
                                            <th>Price</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tfoot>


                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Type</th>
                                            <th>Bedroom</th>
                                            <th>Kitchen</th>
                                            <th>Hall</th>
                                            <th>Price</th>
                                            <th>Address</th>
                                            <th><a href="view_property_image.php" />Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $i=1;
include'include/config.php';
$con=new mysqli('localhost','root','','property')or die(mysqli_error($mysqli));
$query=mysqli_query($con,"select * from pro");
while($res=mysqli_fetch_array($query))
{
$id=$res['id'];
$img=$res['images'];
?>

                                        <tr>
                                            <td><?php echo $res['id']; ?></td>
                                            <td><?php echo $res['type'];?></td>
                                            <td><?php echo $res['bedroom'];?></td>
                                            <td><?php echo $res['kitchen'];?></td>
                                            <td><?php echo $res['hall'];?></td>
                                            <td><?php echo $res['price'];?></td>
                                            <td><?php echo $res['location'];?></td>
                                            <td><img src="images/property/property/<?php echo $img;?>" width="120"></td>
                                             <td>
    <a class='btn btn-info'   href="add_property.php?edit=<?php echo $id;?>"><span class="glyphicon glyphicon-pencil">EDIT</span></a>
    <a class='btn btn-danger' href="process.php?delete=<?php echo $id;?>;" ><span class="glyphicon glyphicon-remove" style="color:white;">DELETE</span></a>

   <!-- <a class='btn btn-success' href="dashboard.php?page=c_info&id=<?php echo $id;?>"><span class="fa fa-eye"></span></a>-->
  
    </td>
                                        </tr>
                                   <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
            <?php include'include/footer.php';?>


                                