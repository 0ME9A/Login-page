
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css_file/forget.css">
</head>
<body>

    <!-- background img added  -->
    <div class="img">
        <div class="cover" id="cover"></div>
        <picture>
            <source media="(min-width: 600px)" srcset="https://images.unsplash.com/photo-1598266628171-7e00f76a27a8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" >
            <img src="https://images.unsplash.com/photo-1530533718754-001d2668365a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="">
        </picture>
    </div>

    <main>
<?php 
    // if user did not get otp then otp will send again on click  
    session_start();
    if($_REQUEST['otp']){
        $randnum = rand(000000,999999);
        $to_email = $_SESSION['emailid'];
        $subjuct = "simple email test via PHP";
        $body = "HI, this is one time password to reset your account password at omega.com \nyour one time password is $randnum \nthis otp is just for 5 minuts.";
        $header = "From: baliramk505@gmail.com";

        if(mail($to_email, $subjuct, $body, $header)){
            $_SESSION["otp"] = $randnum;
            echo '<h1>sir please check your email </h1>
            <h2 style="color: yellow;">we have send a OTP at '. $to_email.' form omega@gmail.com</h2>';
        }
        else{
            // if user did not get otp give error 
            echo '<h1>sorry sir we are not able to reset your account password.</h1>
            <h2 style="color: yellow;">error 404</h2>';
        }
    }
?>

    <span style="text-align: center;">note:- if you are still didn't get a OTP, please check in spam section or try again letter.<br>email us at <a role="mail" href="mailto:omegahelp@gmial.com" target="_blank" style="color: yellow; text-decoration:underline;">omegahelp@gmail.com</a> for extra support.</span>
    </main>

</body>
</html>