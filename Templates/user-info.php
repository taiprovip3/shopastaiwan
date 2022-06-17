<?php
    session_start();
    include_once '../Database/connectDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ShopAsTaiwan mạng lưới server avatar star hàng đầu việt nam. Đa năng, toàn diện và uy tín 100%">
    <title>ShopAsTaiwan.x10.bz | Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ad778f42b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Resources/css/common.css">
    <link rel="stylesheet" href="../Resources/css/user-info.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../Resources/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Resources/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Resources/img/favicon-16x16.png">
    <link rel="manifest" href="../Resources/img/site.webmanifest">
</head>
<body>
    <!-- Authen {fixed} -->
    <div id="authen">
        <?php
            if(isset($_SESSION['username'])){
                include '../Utilities/GetUserBalance.php';
                echo '
                    <div class="small text-center p-1">
                        <a href="./history.php" class="text-reset"><i class="fas fa-user-circle fa-2x"></i></a><br>
                        <code><b>'.getUserBalance($_SESSION['username'],$con).'</b> vnđ</code><br>
                        <a href="../Utilities/logout.php">Logout</a>
                    </div>
                ';
            } else{
                echo '
                <li class="nav-item dropdown list-unstyled">
                    <a class="nav-link dropdown-toggle text-warning" data-bs-toggle="dropdown" href="#">Tài Khoản</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./register.php">Tạo tài khoản</a></li>
                        <li><a class="dropdown-item" href="./login.php">Đăng nhập</a></li>
                    </ul>
                </li>
                ';
            }
        ?>
    </div>
    <!-- Nav Container -->
    <div class="container-fluid">
        <!-- Nav -->
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./shop.php">Shop Acc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Recharge/index.php">Nạp Tiền</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trợ Giúp</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./contact.php">Liên hệ</a></li>
                            <li><a class="dropdown-item" href="./help.php">Hướng dẫn</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Thông tin User</a>
                    </li>
                    <?php
                        if(isset($_SESSION['username'])){
                            if($_SESSION['username'] == "taiproduaxe"){
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="./admin.php">ADMIN</a>
                                </li>
                                ';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- User info {fixed} -->
    <div id="user-info" class="text-center">
        <?php
            if(isset($_GET['username'])){
                $sql = "select * from users a join balances b on a.username = b.username where a.username = '".$_GET['username']."'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);
                    $arr_img = array("hove_head.png","phaothu_head.png","satthu_head.png","bachocdien_head.png");
                    $rd_key = array_rand($arr_img);
                    echo '
                        <img src="../Resources/img/'.$arr_img[$rd_key].'" class="rounded img-thumbnail" width="100%"><br>
                        <a>'.$row["username"].'#'.$row["id"].'</a><br>
                        <code>'. ( $row["vnd"] == 0 ? "00" : number_format($row["vnd"]) ) .' vnđ</code>
                    ';
                } else{
                    echo '
                    <i class="fa-solid fa-triangle-exclamation fa-5x text-warning"></i><br>
                    Oops! User này có vẽ không tồn tại
                    ';
                }
            } else{
                echo '
                <i class="fa-solid fa-triangle-exclamation fa-5x text-warning"></i><br>
                Oops! Có vẽ bạn đang cố gắng làm gì đó??
                ';
            }
        ?>
    </div>
</body>
<?php if(is_resource($con)) mysqli_close($con); ?>
</html>