<?php
session_start();
require('dbconfig/dbconfig.php');

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO List</title>
</head>
<body>
    <h1>Login Page</h1>
    <br>
    <form action="index.php" method = "post">
        <label><b>Username:</b></label><br>
        <input type="text" name = "username" required>
        <label><b>Password:</b></label>
        <input type="password" name= "password" required><br>
        <input type="submit" name="login" value="Login"><br>

        <a href="register.php"><input type="button" value= "Register"></a><br>
    </form>

    <?php
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from userinfotable WHERE username='$username' and password = '$password'";
    $query_run = mysqli_query($con,$query);

    if (mysqli_num_rows($query_run)>0){
        //correct username and password
        $_SESSION['username'] = $username;
        header('location:to_do.php');
    } else{
        //wrong username or password 
        echo "user doesn't exist";
    }
}
?>

</body>
</html>


