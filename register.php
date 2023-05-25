<?php
    include('db_connect.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpassword = $_POST['cpassword'];
    
        if ($pass === $cpassword) {
            $name = htmlspecialchars($uname);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $pass = htmlspecialchars($pass);
            $cpassword = htmlspecialchars($cpassword);

            $sqlQuery = "INSERT INTO user (username, email, password) VALUES ('$uname', '$email', '$pass')";

            if (mysqli_query($conn, $sqlQuery)) {
                header("Location: index.php");
            } else {
                echo "Error registering user";
            }
        } else {
            echo "passwords do not match";
        }

        

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="register" class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h1>Registration form</h1>
            <label for="username">username</label>
            <input type="text" name="username" placeholder="username" required>
            <label for="email">email</label>
            <input type="email" name="email" placeholder="email" required>
            <label for="password">password</label>
            <input type="password" id="password" name="password" placeholder="password" required>
            <label for="cpassword">Confirm password</label>
            <input type="password" id="cpassword" name="cpassword" placeholder="confirm password" required>
            <input type="submit" value="Sign up" id="send">
            <div class="registered">
                <p>Already have an account? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>