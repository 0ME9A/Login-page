<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm account</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css_file/thanks.css">
</head>
<body>
    <main>
        <img src="img/thank.jpg" alt="background-img">
        <div class="content">
        <?php 
            // about website or you can add anithing 
            $para = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo alias nemo dignissimos magni, ad unde reprehenderit pariatur enim sint est sed numquam cupiditate beatae aspernatur nisi excepturi a. Voluptate, vitae.</p>';
            // sesstion start and check matchable session and show result 
            session_start();
            // session will show if user are not registered
            if(isset($_SESSION['nomail'])){
                echo '<h1>invalide user</h1><h3>sorry sir! we are not able to find your account. looks like you are new user!</h3>';
                echo $para;
                echo '<a href="login.html">sign in</a>';
            }
            // session will show if user give wrong password
            elseif(isset($_SESSION['wrong'])){
                echo '<h1>incorrect password!</h1><h3>sorry sir! your password are incorrect please enter correct password.</h3>';
                echo $para;
                echo '<a href="login.html">sign in</a>';    
            }
            // session will show if user give correct email and password
            elseif(isset($_SESSION['olduser'])){
                echo '<h1>welcome back</h1><h3>welcome back '.$_SESSION['olduser'].'</h3>';
                echo $para;
                echo '<a href="login.html">home</a>';
            }
            // session will show if user allready exist and try to register again
            elseif(isset($_SESSION['allready'])){
                echo '<h1>welcome back</h1><h3>sir your account allready exist! please sign in.</h3>';
                echo $para;
                echo '<a href="login.html">sign in</a>';
            }
            // session will show if user is new 
            elseif(isset($_SESSION['newuser'])){
                echo '<h1>thank you</h1><h3>we are happy that you are joing us.</h3>';
                echo $para;
                echo '<a href="login.html">home</a>';
            }
            // if everything fail then default data will show
            else{
                echo '<h1>thank you</h1><h3>we are happy that you are joing us.</h3>';
                echo $para;
                echo '<a href="login.html">home</a>';
            }

        ?>
        </div>
    </main>
</body>
</html>