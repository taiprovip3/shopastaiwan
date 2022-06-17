<?php
    $accchuaban = 0;
    $accdaban = 0;
    $accmatgmail = 0;
    $acccongmail = 0;
    $sql = "select count(*) from accounts where is_sold = 0;";//Acc chưa bán
    $sql .= "select count(*) from accounts where user_email is not NULL;";//Acc còn gmall;
    $sql .= "select count(*) from accounts where is_sold = 1";//Acc đã bán
    if($con -> multi_query($sql))
    {
        $result = $con -> store_result();
        $row = $result -> fetch_row();
        $accchuaban = $row[0];//Acc chưa bán
        $result -> free_result();
        $con -> next_result();
        $result = $con -> store_result();
        $row = $result -> fetch_row();
        $acccongmail = $row[0];//Acc còn gmail
        $result -> free_result();
        $con -> next_result();
        $result = $con -> store_result();
        $row = $result -> fetch_row();
        $accdaban = $row[0];//Acc đã bán
        $result -> free_result();
        $accmatgmail = $accchuaban - $acccongmail;//Acc mất gmail
    }
?>