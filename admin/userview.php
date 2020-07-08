<?php include('include/userheader.php');?>
      
      <script type="text/javascript">

function delet(id)
{
if(confirm("you want to delete ?"))
{
window.location.href='delete_property.php?x='+id;
}
}

</script>
<!-- Header -->

<section>
 
 <!-- Left Sidebar -->
<?php include('include/usersidebar.php');?>
  <!-- #END# Left Sidebar -->
  <section class="content">
              <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <a class="btn btn-info" href="add_property.php">Add Property</a>
                      <h2 style="text-align: center;">
                       View Property
                      </h2>
                  </div>
                      <?php
                      if(isset($_SESSION['message'])):
                  ?>
                  <div class=alert alert-<?=$_SESSION['msg_type']?>">
                  <?php
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);
                      session_destroy();
                  ?>
                  </div>
                  <?php endif ?>
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
                                      <th><a href="userviewimg.php" />Image</th>
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
                                      <td><img src="images/property/<?php echo ($img);?>" width="120"></td>
                                       <td>
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


                          