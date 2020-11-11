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
    <!-- navbar area  -->
    <nav>
        <h1><a href="#">omega</a></h1>
        <a href="#"><i class="fas fa-times"></i></a>
    </nav>
    <!-- this is form area for otp  -->
    <main>
        <h2>we have send you a OTP at your email:-<br><span>
        <?php 
            session_start();
            if(isset($_SESSION['emailid'])){
                echo $_SESSION['emailid'];
            }else{
                echo "no email";
            }
        ?>
        </span></h2>
        <form action="forget_main.php" method="POST">
            <div class="input_area">
                <label for="forget_stage02" id="confirm_otp">enter OTP</label>
                <input type="text" name="forget_stage02" id="forget_stage02" required>
            </div>
            <span id="otp_send"> <a href="resend_otp.php?otp=send" target="_blank">resend otp</a></span>
            <button id="forget_btn">send</button>
        </form>
    </main>
    <script>

        var otp_btn = document.getElementById('otp_send');
    </script>
</body>
</html>