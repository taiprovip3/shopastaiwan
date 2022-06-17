<?php
    if(isset($_POST['login'])){//Gọi từ form
        include '../Database/connectDB.php';
        session_start();
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $query = "select * from users where username = '$username'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0){//TH yes exists
            $row = mysqli_fetch_array($result);
            if(password_verify($password,$row["password"])){//TH match password
                $_SESSION['username'] = $username;
                mysqli_query($con,"insert into logs (action,username) values ('Logged success','$username')");
                header('Location: ../index.php');
            } else{//TH wrongpw
                mysqli_query($con,"insert into logs (action,username) values ('Login fail cause wrong pw','$username')");
                header('Location: ../Templates/login.php?response=wrongpw');
            }
        } else{//TH no exists
            header('Location: ../Templates/login.php?response=noexist');
        }
        $con -> close();
    }
?>