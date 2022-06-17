<?php
    $username = $_SESSION['username'];
    $sql = "select * from trans_acc a join accounts b on a.acc_id = b.id where a.username = '$username'";
    $result = mysqli_query($con, $sql);
    $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    json_encode($json);
    $countrow = count($json);
    for ($i = 0; $i < $countrow; $i++)
    {
        $row = $json["$i"];
        echo '
        <tr class="text-success">
            <td>#'.$row["id"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row["time_triggerred"].'.</td>
            <td>'.$row["acc_user"].'</td>
            <td>'.$row["acc_password"].'</td>
            <td>'. ($row["user_email"] == NULL ? "Tài khoản mất email vv" : $row["user_email"]) .'</td>
            <td>'.number_format($row["money_up"]).' vnđ</td>
            <td>'.number_format($row["money_down"]).' vnđ</td>
        </tr>
        ';
    }
?>