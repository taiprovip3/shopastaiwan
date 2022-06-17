<?php
    if(isset($_POST['comment'])){//Gọi từ form
        session_start();
        if(isset($_SESSION['username'])){
            include '../Database/connectDB.php';
            $content = $_POST['content'];
            $sql = "insert into comments (username,comment) values ('".$_SESSION['username']."','$content')";
            if(mysqli_query($con,$sql)){
                header('Location: ../index.php');
            } else{
                header('Location: ../index.php?response=404');
            }
            $con -> close();
        } else{
            header('Location: ../index.php?response=nolog');
        }
    }
?>