<?php
$mysqli=new mysqli('localhost','root','','property')or die(mysqli_error($mysqli));

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    
    if($_POST['pass']==$_POST['cpass']){
        $pass=$_POST['pass'];	
    }
    else{
        echo ("Passwords dont match");
        exit();
    }
    $status=$_POST['status'];
    $check = getimagesize($_FILES["file"]["tmp_name"]);
		$file=$_FILES['file']['name'];
		 
		move_uploaded_file($_FILES['file']['tmp_name'],"images/user/".$_FILES['file']['name']);
    $mysqli->query("INSERT INTO admin(name,email,password,img,status) VALUES('$name','$email','$pass','$file','$status')") or die($mysqli->error);
    header("Location: login.php");
}