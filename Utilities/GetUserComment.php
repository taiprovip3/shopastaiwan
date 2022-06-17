<?php 
    function getUserComentLeft($con){
        $sql = "select * from comments";
        $result = mysqli_query($con, $sql);
        $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        json_encode($json);
        $countrow = count($json);
        for ($i = 0; $i < $countrow; $i++)
        {
            $row = $json["$i"];
            if($i % 2 != 0){
                $arr_img = array("hove_head.png","phaothu_head.png","satthu_head.png","bachocdien_head.png");
                $rd_key = array_rand($arr_img);
                echo '
                <div id="one-cmt" class="d-flex mt-1 mb-1">
                    <div>
                        <img src="./Resources/img/'.$arr_img[$rd_key].'" alt="ICON" width="50px" class="rounded-circle">
                    </div>
                    <div class="p-1">
                        <a href="./Templates/user-info.php?username='.$row["username"].'">'.$row["username"].'</a><br>
                        <i class="fas fa-pen-square">:</i> '.$row["comment"].'
                    </div>
                </div>
                ';
            }
        }
    }
    function getUserComentRight($con){
        $sql = "select * from comments";
        $result = mysqli_query($con, $sql);
        $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        json_encode($json);
        $countrow = count($json);
        for ($i = 0; $i < $countrow; $i++)
        {
            $row = $json["$i"];
            if($i % 2 == 0){
                $arr_img = array("hove_head.png","phaothu_head.png","satthu_head.png","bachocdien_head.png");
                $rd_key = array_rand($arr_img);
                echo '
                <div id="one-cmt" class="d-flex mt-1 mb-1" style="direction: rtl">
                    <div>
                        <img src="./Resources/img/'.$arr_img[$rd_key].'" alt="ICON" width="50px" class="rounded-circle">
                    </div>
                    <div class="p-1">
                        <a href="./Templates/user-info.php?username='.$row["username"].'">'.$row["username"].'</a><br>
                        <i class="fas fa-pen-square">:</i> '.$row["comment"].'
                    </div>
                </div>
                ';
            }
        }
    }
?>