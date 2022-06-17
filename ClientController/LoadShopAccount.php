<?php
    include '../Database/connectDB.php';
    $sql = "select * from accounts where is_sold = 0";
    $result = mysqli_query($con, $sql);
    $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    json_encode($json);
    $countrow = count($json);
    for ($i = 0; $i < $countrow; $i++)
    {
        $row = $json["$i"];
        echo '
        <div class="col-lg-3 p-1 small border m-1 align-self-start" id="one-acc">
            <div id="one-acc-id">
                <span class="bg-danger p-1">Mã tài khoản: #<b id="acc-id">'.$row["id"].'</b></span>
            </div>
            <img src="data:'.$row["img_type"].';base64,'.base64_encode($row["img_data"]).'" alt="LOGO" width="100%" class="img-thumbnail">
            <div class="d-flex">
                <div class="col-lg-6 p-1">
                    <span>(<i class="fas fa-leaf text-warning"></i>) Súng huyền thoại: <b>'.$row["huyenthoai"].'</b></span><br>
                    <span>(<i class="fab fa-envira text-primary"></i>) Súng cực hiếm: <b>'.$row["cuchiem"].'</b></span><br>
                    <span>(<i class="fab fa-pagelines text-success"></i>) Súng hiếm: <b>'.$row["hiem"].'</b></span><br>
                    <span>(<i class="fas fa-khanda text-danger"></i>) Lực chiến max: <b>'.$row["br"].'</b></span><br>
                </div>
                <div class="col-lg-6 p-1">
                    <ul>
                        <li>'.$row["des1"].'</li>
                        <li>'.$row["des2"].'</li>
                        <li>'.$row["des3"].'</li>
                    </ul>
                </div>
            </div>
            <button class="btn btn-success need-width" id="show-confirm-box">'.number_format($row["price"]).' vnđ</button>
            <a href="./acc-info.php?id='.$row["id"].'" role="button" class="btn btn-outline-light need-width">Xem chi tiết</a>
        </div>
        ';
    }
?>