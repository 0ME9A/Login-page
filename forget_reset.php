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
    <!-- this is background img  -->
    <div class="img">
        <div class="cover" id="cover"></div>
        <picture>
            <source media="(min-width: 600px)" srcset="https://images.unsplash.com/photo-1598266628171-7e00f76a27a8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" >
            <img src="https://images.unsplash.com/photo-1520690214124-2405c5217036?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="">
        </picture>
    </div>
    <!-- this is navbar  -->
    <nav>
        <h1><a href="#">omega</a></h1>
        <a href="#"><i class="fas fa-times"></i></a>
    </nav>
    <!-- this is form area for creating a new password  -->
    <main>
        <h2>now time to set a new password.<br><span>
        <?php 
            session_start();
            echo $_SESSION['emailid']; 
        ?>
        </span></h2>
        <span id="note">
            note:- create password min 8 charater and please include symbol, number, and letter to create strong password.
        </span>
        <form action="forget_main.php" method="POST">
            <div class="input_area">
                <label for="forget_stage03" id="password">new password</label>
                <input type="password" name="forget_stage03" id="forget_stage03" required value="">
            </div>
            <div class="input_area">
                <label for="forget_stage04" id="confirm_password">confirm password</label>
                <input type="password" name="forget_stage04" id="forget_stage04" required value="">
            </div>
            <button id="forget_btn">send</button>
        </form>
    </main>


    <script>
        // variable for reguler expression
        var findnum = /[0-9]/g;
        var findspe = /\W/g;
        var findalpha = /[a-z A-Z]/g;
        var forget_stage03 = document.getElementById('forget_stage03');
        var forget_stage04 = document.getElementById('forget_stage04');
        var forget_btn = document.getElementById('forget_btn');
        // here we confirm that user is giving data is correct and acceptable or not 
        document.getElementsByClassName('input_area')[1].style.display = 'none';
        forget_btn.style.display = 'none';
        forget_btn.disabled = true;
        forget_stage03.onchange = function(){
            var pass = forget_stage03.value;
            if(pass.match(findnum) && pass.match(findspe) && pass.match(findalpha) && (pass.length >= 8)){
                    console.log('great password');
                    document.getElementsByClassName('input_area')[1].style.display = 'flex';
            }
            else{
                document.getElementsByClassName('input_area')[1].style.display = 'none';
                forget_btn.style.display = 'none';
                alert('please include letter, alphabate and symbol in your password \nwe take min 8 letter in password');
            }
        }
        // loop in every 1s to check that both password area are same or not if yes then btn will visible else btn will hide 
        setInterval(() => {
            var pass = forget_stage04.value;
            if(pass == forget_stage03.value && pass.length >= 8){
                console.log('great password');
                forget_btn.style.display = 'block';
                forget_btn.disabled = false;
            }
            else{
                forget_btn.style.display = 'none';
                forget_btn.disabled = true;

                // alert('your password do not match please check and enter same password in both column.');
            }
        }, 1000);
        
    </script>
</body>
</html>