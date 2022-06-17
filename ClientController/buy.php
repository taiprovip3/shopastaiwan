<?php 
    if(isset($_POST['acc-id'])){//Gọi từ form
        session_start();
        if(isset($_SESSION['username'])){
            include '../Database/connectDB.php';
            $username = $_SESSION['username'];
            $acc_id = $_POST['acc-id'];
            $sql = "select vnd from balances where username = '$username';";
            $sql .= "select price from accounts where id = '$acc_id'";
            $user_balance = 0;
            $acc_price = 0;
            if($con -> multi_query($sql)){
                $result = $con -> store_result();
                $row = $result -> fetch_row();
                $user_balance = $row[0];
                $result -> free_result();
                $con -> next_result();
                $result = $con -> store_result();
                $row = $result -> fetch_row();
                $acc_price = $row[0];
            }
            if($user_balance >= $acc_price){
                $sql = "insert into trans_acc (username,acc_id,name,money_up,money_down) values ('$username','$acc_id','Mua tài khoản',$user_balance,$user_balance - $acc_price);";
                $sql .= "update balances set vnd = vnd - $acc_price where username = '$username';";
                $sql .= "update accounts set is_sold = 1 where id = '$acc_id'";
                if(mysqli_multi_query($con,$sql)){
                    header('Location: ../Templates/shop.php?response=success');
                } else{
                    header('Location: ../Templates/shop.php?response=404');
                }
            } else{
                header('Location: ../Templates/shop.php?response=noeng');
            }
            $con -> close();
        } else{
            header('Location: ../Templates/shop.php?response=nolog');
        }
    }
?>