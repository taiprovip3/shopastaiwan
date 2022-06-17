<?php 
    if(isset($_POST['register'])){//Gọi từ form
        include '../Database/connectDB.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from users where username = '$username'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0){
            header('Location: ../Templates/register.php?response=conflict');
        } else{
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = "insert into users (username,password) values ('$username','$password');";
            $sql .= "insert into balances (username) values ('$username');";
            $sql .= "insert into logs (action, username) values ('Register account','$username')";
            if(mysqli_multi_query($con, $sql)){
                header('Location: ../Templates/register.php?response=success');
            } else{
                header('Location: ../Templates/register.php?response=404');
            }
        }
        $con -> close();
    }
?>