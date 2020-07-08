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
		$check = getimagesize($_FILES["file"]["tmp_name"]);
		$file=$_FILES['file']['name'];
		echo $status;
		 
		move_uploaded_file($_FILES['file']['tmp_name'],"images/property/property/".$_FILES['file']['name']);
		$mysqli->query("INSERT INTO pro(owner,type,size,price,description,location,lat,lon,images,kitchen,hall,bedroom,bathroom,balcony) VALUES('$owner','$type','$size','$price','$des','$loc','$lat','$lon','$file','$kitchen','$hall','$bedroom','$bathroom','$balcony')") or die($mysqli->error);
  		$mysqli->query("insert into images(owner,type) values('$owner','$type')");
		$_SESSION['message']="Record has been saved successfully";
		$_SESSION['msg_type']="success";
		
			header("Location: userprop.php");
		
	}