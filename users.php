<?php
include("database.php");
include("middleware.php");   

##Delete user, if id is set
if(isset($_GET['id'])){
    extract($_GET);
    $sql="DELETE FROM users where id= ".$id;
    $result = $conn->query($sql);
    if($result)
        echo "User has been deleted";
    else 
      echo "Something went wrong, please try again";    
}

//Get all users
$sql="select * from users";   // * ka matlab "sabhi" hota hai
$result=$conn->query($sql);

// echo $_SESSION['name']; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="section">
        <?PHP include("alert.php"); ?>
        <h2>All Users</h2>
        <table id="users">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
</thead>
                <tbody>
                <?php
                if($result->num_rows>0){
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['username']?></td>  
                    <td><?php echo date("d-m-Y H:i A", strtotime($row['created_at']))?></td>
                    <td>15-05-2023, 10:22 am</td>
                    <td>
                        <a href="edit-user.php?id=<?php echo $row['id']?>" class="button edit">Edit</a>
                        <a href="users.php?id=<?php echo $row['id']?>" class="button delete">Delete</a>
                    </td>
                </tr>
                <?php } 
                } else {
                    echo "<tr><td colspan='3'>No record found!</td></tr>";
                }
                
                ?>
</tbody>
        </table>
        <!-- <div class="btn">
            <a href="add-user.php">
            <button class="button" style="width:20vh; background-color:purple">Add User</button>
            </a>
        </div> -->
       <div class="container" style="background-color:#f1f1f1">
        <a href="add-user.php" class="footerbtn">Add User</a>
        <a href="logout.php" class="footerbtn">Logout</a>
       </div>
    </section>
</body>
</html>