<?php
    function getUserBalance($username,$con){
        $balance = 0;
        $sql = "select vnd from balances where username = '$username'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $balance = $row[0];
        }
        if($balance <= 0){
            $balance = "00";
        } else{
            $balance = number_format($balance);
        }
        return $balance;
    }
?>