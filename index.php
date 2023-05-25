<?php
    session_start();

    include('db_connect.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $uname = $_POST['username'];
        $pass = $_POST['password'];

        $uname = htmlspecialchars($uname);
        $pass = htmlspecialchars($pass);
    
        $sqlQuery = "SELECT * FROM user WHERE username = '$uname' AND password = '$pass'";

        $results = mysqli_query($conn, $sqlQuery);

        if($results && mysqli_num_rows($results) > 0){
            // Set session variables upon successful login
            $_SESSION['username'] = $uname;
        
            // Redirect the user to the homepage
            header('Location: home.php');
            exit();

        }else{
            echo "Invalid details";
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="login" class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1>Login form</h1>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" value="Sign in" id="send">
            <div class="not-registered">
                <p>Dont have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>

