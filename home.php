<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect the user to the login page
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        // Redirect the user to the login page
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home panel</title>
</head>
<body>
    <h2>Hello <?php echo $_SESSION['username']; ?> , welcome to the home panel</h2>
    <form action="" method="POST" >
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>