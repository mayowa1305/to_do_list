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
    <title>Register</title>
</head>
<body>
    <h1>Register</h1><br>

    <form action="register.php" method="post">
        <label><b>Username:</b></label><br>
        <input type="text" name= "username" required><br>
        <label"><b>Password:</b></label><br>
        <input type="password" name = "password" required><br>
        <label"><b>Match Password:</b></label><br>
        <input type="text" name = "cpassword" required><br><br>

        <input type="submit" value="Signup" name= "signup"><br>
        <a href="index.php"><input type="button" value="Login"></a>



    </form>
    
</body>
</html>

<?php
if (isset($_POST['signup'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $query = "select * from userinfotable WHERE username='$username'";
        $query_run = mysqli_query($con,$query);

        if (mysqli_num_rows($query_run)>0) {
            echo "username exist try again";
        } else{
            $query = "insert into userinfotable values('','$username','$password')";
            $query_run = mysqli_query($con,$query);

            if ($query_run){
                echo "user registered you can login now";
            } else{
                echo mysqli_error($con);
            }
        }
    } else{
        echo "passwords do not match";
    }
}
?>