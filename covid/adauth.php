<?php
    session_start();      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    $error = "username/password incorrect";
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from admininfo where adusername = '$username' and adpassword = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
            $_SESSION['adsusername'] = $username;
            header("Location: vaccen.php");
        }  
        else{  
            $_SESSION["error"] = $error;
            header("Location: adlogin.php");  
        }     
?>  