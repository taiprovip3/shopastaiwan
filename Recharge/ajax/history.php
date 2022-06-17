<?php
    $sql = "select * from trans_log order by id desc limit 10";
    $result = mysqli_query($con, $sql);
    $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    json_encode($json);
    $countrow = count($json);
    for ($i = 0; $i < $countrow; $i++)
    {
        $row = $json["$i"];
        $status = '<span class="text-info">Chờ duyệt</span>';
        if($row["status"] == 1){
            $status = '<mark>Thành công</mark>';
        }
        if($row["status"] == 2){
            $status = '<span class="text-danger">Thất bại</span>';
        }
        if($row["status"] == 3){
            $status = '<span class="text-danger">Sai mệnh giá</span>';
        }
        echo '
        <tr class="text-success">
            <td>#'.$row["id"].'</td>
            <td>'.$row["name"].'</td>
            <td>'.number_format($row["amount"]).'vnđ</td>
            <td>'.$row["type"].'.</td>
            <td>'.$status.'</td>
            <td>'.$row["date"].'</td>
        </tr>
        ';
    }
?>