<?php
session_start();
	$mysqli=new mysqli('localhost','root','','property')or die(mysqli_error($mysqli));

			
			

	if(isset($_POST['submit'])){
		$owner=$_POST['property_owner'];
		$type=$_POST['property_type'];
		$size=$_POST['lot_size'];
		$price=$_POST['price'];
		$des=$_POST['description'];
		$loc=$_POST['add'];
		$lat=$_POST['lat'];
		$lon=$_POST['lon'];
		$kitchen=$_POST['kitchen'];
		$hall=$_POST['hall'];
		$bedroom=$_POST['bedroom'];
		$bathroom=$_POST['bathroom'];
		$balcony=$_POST['balcony'];
		$status=$_POST['status'];
		$check = getimagesize($_FILES["file"]["tmp_name"]);
		$file=$_FILES['file']['name'];
		echo $status;
		 
		move_uploaded_file($_FILES['file']['tmp_name'],"images/property/property/".$_FILES['file']['name']);
		$mysqli->query("INSERT INTO pro(owner,type,size,price,description,location,lat,lon,images,kitchen,hall,bedroom,bathroom,balcony) VALUES('$owner','$type','$size','$price','$des','$loc','$lat','$lon','$file','$kitchen','$hall','$bedroom','$bathroom','$balcony')") or die($mysqli->error);
  		$mysqli->query("insert into images(owner,type) values('$owner','$type')");
		$_SESSION['message']="Record has been saved successfully";
		$_SESSION['msg_type']="success";
		$res1=$mysqli->query("select * from admin where status='$status'") or die($mysqli->error);
		if($res1){  
		header("Location: add_property.php");	
		}
		else{
			header("Location: userprop.php");
		}
		
	}
	
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		
		$mysqli->query("DELETE FROM images wHERE proid=$id");
		$mysqli->query("DELETE FROM pro wHERE id=$id");
		
		$_SESSION['message']="Record has been deleted";
		$_SESSION['msg_type']="danger";
		
		header("Location: view_property.php");
	
	}

	if(isset($_POST['update'])){
		$owner=$_POST['property_owner'];
		$type=$_POST['property_type'];
		$size=$_POST['lot_size'];
		$price=$_POST['price'];
		$des=$_POST['description'];
		$loc=$_POST['add'];
		$lat=$_POST['lat'];
		$lon=$_POST['lon'];
		$kitchen=$_POST['kitchen'];
		$hall=$_POST['hall'];
		$bedroom=$_POST['bedroom'];
		$bathroom=$_POST['bathroom'];
		$balcony=$_POST['balcony'];
		$hidden=$_POST['hidden'];
		$check = getimagesize($_FILES["file"]["tmp_name"]);
		$file=$_FILES['file']['name'];
		
		move_uploaded_file($_FILES['file']['tmp_name'],"images/property/property/".$_FILES['file']['name']);
		$mysqli->query("update pro set owner='$owner', type='$type', size='$size', price='$price', description='$des', location='$loc', lat='$lat', lon='$lon', 
			images='$file', kitchen='$kitchen', hall='$hall', bedroom='$bedroom', bathroom='$bathroom', balcony='$balcony' where id='$hidden'") or die($mysqli->error);
		
		$mysqli->query("update images set owner='$owner',type='$type' where proid='$hidden'");
		$_SESSION['message']="Record has been updated successfully";
		$_SESSION['msg_type']="warning";

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
		
		header("Location: add_property.php");	
		
		
	}

	?>