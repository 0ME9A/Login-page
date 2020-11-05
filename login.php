<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-img">
        <img src="https://images.unsplash.com/photo-1481026469463-66327c86e544?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1048&q=80" alt="background-img">
    </div>
    <main>
        <nav>
            <a href="#">Omega</a>
            <button type="submit" id="toggler1">sign in</button>
        </nav>
        
        <div class="form-area">
            <div class="form1 formA">
                <form action="#" autocomplete="off">
                    <input type="text" placeholder="username" name="Username" autofocus>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="password" placeholder="password">
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="confirm-password">
                    <div class="gender">
                        <div class="male">
                            <input type="radio" name="gender" id="male" value="male">
                            <label for="male">male</label>
                        </div>
                        <div class="female">
                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female">female</label>
                        </div>
                    </div>
                    <button type="submit">register</button>
                </form>
            </div>
            <div class="form1 form2">
                <form action="#">
                        <input type="email" name="signin-email" id="signin-email" placeholder="Email">
                        <input type="password" name="signin-password" id="signin-password" placeholder="password">
                        <a href="#">forgot password</a>
                    <button type="submit">sign in</button>
                </form>
            </div>
        </div>
        <div class="continue-with">
           <a href="#"><span class="google">G</span><p class="google">continue with google</p></a>
           <a href="#"><span class="facebook">F</span><p class="facebook">continue with facebook</p></a>
        </div>
        <div class="form-toggler">
            <button type="submit" id="toggler2">sign in</button>
        </div>
    </main>


    <script src="script.js"></script>
</body>
</html>