<?php 
// variable and value for new user
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $gender = $_POST['gender'];
// variable and value for old user
    $signin_email = $_POST['signin-email'];
    $signin_password = $_POST['signin-password'];
// connection variable
    $servername = "localhost";
    $serveruser = "root";
    $serverpassword = "";
    $dbname = "web4";
// create function for destory previus session and create a new one
    function sess(){
        session_start();
        session_unset();
        session_destroy();
        session_start();
    }

// connection created
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$serveruser,$serverpassword);
    // create user account
    if (isset($username)){
        try {
            // select last id form database to give a special userid
            $sql = "SELECT * FROM user_account_data ORDER BY id DESC LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $last_no = $result['id']+1;
            // userid created
            $userid = $username.$last_no;
            // select everything form database to check that user exist or not
            $check_sql = "SELECT * FROM user_account_data WHERE useremail='$email'";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->execute();
            $check_result = $check_stmt->fetch(PDO::FETCH_ASSOC);
            // check user exist or not if yes redirect to singn in page if not then create user account
            if ($check_result){
                sess();
                echo $_SESSION["allready"] = "user allready exist plese sine in.";
                // redirect to thank page confarmation will show there
                header("Location:http://localhost/web4/thank.php");
            }
            else{
                // insert data in database if user is new
                $add_sql = "INSERT INTO user_account_data(username, useremail, password, confirm_password, user_id, gender) VALUES('$username', '$email', '$password', '$confirm_password', '$userid', '$gender')";
                $conn->exec($add_sql);
                $user_table = "CREATE TABLE $userid(
                    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    userid VARCHAR(30) NOT NULL,
                    bookmark VARCHAR(10),
                    liked VARCHAR (10),
                    disliked VARCHAR(10),
                    date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                $conn->exec($user_table);
                // session start for use everywhare
                sess();
                $_SESSION["newuser"] = 'thank you for being a part of us.';
                $_SESSION["userid"] = $check_result['user_id'];
                header("Location:http://localhost/web4/thank.php");
            }
        } catch(PDOException $e){
            echo "connection failed: ".$e->getMessage();
        }
    }

    if (isset($signin_email)){
        // select everything form database to check that user exist or not
        $check_sql = "SELECT * FROM user_account_data WHERE useremail='$signin_email'";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->execute();
        $check_result = $check_stmt->fetch(PDO::FETCH_ASSOC);
        // check user exist or not if yes redirect to singn in page if not then create user account
        if ($check_result['useremail'] != $signin_email){
            echo "your account does'nt exist";
            sess();
            $_SESSION["nomail"] = 'sir your account does not exist.';
            header("Location:http://localhost/web4/thank.php");
        }
        elseif ($check_result['password'] != $signin_password){
            echo "your password are incorrect";
            sess();
            $_SESSION["wrong"] = 'sir your password are incorrect.';
            header("Location:http://localhost/web4/thank.php");
        }
        else{
            echo "you are now loged in";
            sess();
            $_SESSION["userid"] = $check_result['user_id'];
            $_SESSION["olduser"] = $check_result['username']; 
            header("Location:http://localhost/web4/thank.php");
        }
    }
?>
