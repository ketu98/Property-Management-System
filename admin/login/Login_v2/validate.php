<?php
$mysqli=new mysqli('localhost','root','','property')or die(mysqli_error($mysqli));

if(isset($_POST['submit'])){

    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $status=$_POST['status'];

    $query=mysqli_query($mysqli,"select * from admin where email=$email");
    $res=mysqli_fetch_array($query);
    if($res[password]=$pass){
        header("Location: dashboard.php");
    }
    else{
        echo "Wrong Details"
        header("Location: login.php");
    }

}