<?php

include "config.php";

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);

    if ($email != "" && $pass != ""){

        $sql_query = "select count(*) as cntadmin from admin where email='".$email."' and password='".$pass."' and status='1'";
        $sql_query2 = "select count(*) as cntUser from admin where email='".$email."' and password='".$pass."' and status='0'";
        $result = mysqli_query($con,$sql_query);
        $result2 = mysqli_query($con,$sql_query2);
        $row = mysqli_fetch_array($result);
        $row2 = mysqli_fetch_array($result2);

        $count = $row['cntadmin'];
        $count2 = $row2['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            header('Location: dashboard.php');
        }
        elseif($count2 > 0){
            $_SESSION['email']=$email;
            header('Location: user.php');
        }
        else{
            echo "Invalid username and password";
        }

    }

}