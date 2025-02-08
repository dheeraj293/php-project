<?php
include("database.php");
// $_SESSION['name']="Welcome";
include("middleware.php");

//from submit working
if(isset($_POST['submit'])){
     extract($_POST);    //isse $_POST  ko baar baar likhne ki jrurat nhi padti;
      $date=date("Y-m-d H:i:s");
      $pass=md5($password);
       $sql="INSERT INTO users (username,password,created_at) VALUES('$username','$pass', '$date')";
      $result=$conn->query($sql);
      if($result){
        $_SESSION['success']="User has  been created";
      }else{
      $_SESSION['error']="something went wrong, please try again";
}
header("LOCATION: users.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <link rel="stylesheet" type="text" href="style.css">
</head>
<body>
    <section class="section">
        <h2>Register Form</h2>
        <form action="add-user.php" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="submit">Signup</button>
            </div>
        </form>

        <div class="container" style="background-color:#f1f1f1">
            <a href="users.php" class="footerbtn">All Users</a>
            <a href="logout.php" class="footerbtn">logout</a>
        </div>
    </section>
</body>
</html>