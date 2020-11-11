<?php
// adding php database connection file 
require 'php_connetion.php';
function sess(){
    session_start();
    session_unset();
    session_destroy();
    session_start();
}
// check if email is given or not yes process will go else errore get 
if (isset($_POST["forget_stage01"])){
    $forget_stage01 = $_POST["forget_stage01"];
    // if email is set then data will fetch form database of user 
    try {
        $sql = "SELECT * FROM user_account_data WHERE useremail='$forget_stage01'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        // if email will persent in database we will send otp at given email 
        if ($result["useremail"] == $forget_stage01){
            $randnum = rand(000000,999999);
            $to_email = $_POST['forget_stage01'];
            $subjuct = "simple email test via PHP";
            $body = "HI, this is one time password to reset your account password at omega.com \nyour one time password is $randnum \nthis otp is just for 5 minuts.";
            $header = "From: baliramk505@gmail.com";
            if(mail($to_email, $subjuct, $body, $header)){
                echo "email successfully sent to $to_email";
            }
            else{
                echo "email sending faild02";
                header("Location:error.html");
            }
            // session will set if email match 
            sess();
            $_SESSION["otp"] = $randnum;
            $_SESSION["valid"] = 'sir your account exist.';
            $_SESSION['emailid'] = $forget_stage01;
            header("Location:forget_otp.php");
        }
        else {
            // if useremail not persent in database then unset all sesion and set new session and redirect
            sess();
            $_SESSION["nomail"] = 'sir your account does not exist.';
            header("Location:http://localhost/web4/thank.php");
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}
else{
    // if email not set then redirect at error 
    echo "didn't get";
    header("Location:error.html");
}


// here session will start again 
session_start();
// if otp is set then go forword else redirect alt error page 
if(isset($_POST['forget_stage02'])){
    // if otp will match with seted session then go forword else redirect at same page forget_otp page  
    if($_POST['forget_stage02'] == $_SESSION['otp']){
        echo "correct otp";
        header("Location:http://localhost/web4/forget_reset.php");
    }
    else {
        echo "otp incorrect please sign again.";
        header("Location:forget_otp.php");
    }
}
else{
    echo "error 404";
    header("Location:error.html");
}


// after correct otp page will come at password time 
if (isset($_POST['forget_stage04'])){
    $pass = $_POST['forget_stage03'];
    $conpass = $_POST['forget_stage04'];
    $useremailid = $_SESSION['emailid'];
    // if email session still set then password will update and redirect at update_done page 
    if(isset($_SESSION['emailid'])){
        $update_pass = "UPDATE user_account_data SET password='$pass',confirm_password='$conpass' WHERE useremail='$useremailid'";
        $update_stmt = $conn->prepare($update_pass);
        $update_stmt->execute();
        echo "your password successfully updated";
        session_unset();
        session_destroy();
        header("Location:update_done.html");
    }
    else{
        // if email not set in session then redirect at error page 
        echo "unable to update your password";
        header("Localhost:error.html");
    }
}
else{
    echo "errore id stage 03";
    header("Localhost:error.html");
}





if (isset($_GET['click'])){
    session_unset();
    session_destroy();
    echo "you are logout...";
}
else{
    echo "something wrong...";
}


?>