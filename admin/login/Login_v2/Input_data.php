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

    $mysqli->query("INSERT INTO admin(name,email,password,status) VALUES('$name','$email','$pass','$status')") or die($mysqli->error);
    header("Location: login.php");
}