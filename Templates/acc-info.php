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
    <title>ShopAsTaiwan.x10.bz | Mô tả Acc AS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ad778f42b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Resources/css/common.css">
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
                        <li><a class="dropdown-item" href="./register">Tạo tài khoản</a></li>
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
                        <a class="nav-link active" href="#">Mô tả Sản phẩm</a>
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
        <!-- Acc info -->
        <div class="row">
            <div class="col-lg-12 p-5 small">
                <?php
                    if(isset($_GET['id'])){
                        $sql = "select * from account_details where acc_id = '".$_GET['id']."'";
                        $result = mysqli_query($con,$sql);
                        if(mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_array($result);
                            echo '
                                <p><i class="far fa-edit text-info"></i> Mô tả 1:_'.$row["title_1"].'</p>
                                <img src="data:'.$row["img_type_1"].';base64,'.base64_encode($row["img_1"]).'" alt="DETAIl" class="img-thumbnail">
                                <hr class="text-primary">
                                <p><i class="far fa-edit text-info"></i> Mô tả 2:_'.$row["title_2"].'</p>
                                <img src="data:'.$row["img_type_2"].';base64,'.base64_encode($row["img_2"]).'" alt="DETAIl" class="img-thumbnail">
                            ';
                        } else{
                            echo '
                            <div class="text-center">
                                <i class="fas fa-exclamation-triangle fa-5x text-danger"></i><br>Không có mô tả chi tiết cho sản phẩm này.
                            </div>
                            ';
                        }
                    } else{
                        echo '
                        <div class="text-center">
                            <i class="fas fa-exclamation-triangle fa-5x text-danger"></i><br>Có vẽ bạn đang cố làm điều gì đó??
                        </div>
                        ';
                    }
                 ?>
            </div>
        </div>
        <!-- note -->
        <div class="row">
            <div class="col-lg-12 small bg-dark p-1" id="note" style="position: fixed; bottom: 0;">
                <i class="fas fa-exclamation-circle text-warning"></i> Do bị giới hạn về dung lượng nên chỉ có ảnh chính & khái quát nhất. Để kỹ hơn khi lựa chọn acc, bạn hãy liên hệ FB admin để xem thêm ảnh.
            </div>
        </div>
    </div>
    <!-- Announcer -->
    <div id="announcer">
        <?php
            if(isset($_GET['response'])){
                $val = $_GET['response'];
                if($val == "success"){
                    echo '
                        <div class="alert alert-success">
                            <strong>Đăng ký</strong> thành công.
                        </div>
                    ';
                    echo '
                        <script>
                        jQuery(document).ready(function(){
                            setTimeout(() => {
                                $(".alert").hide();
                                window.location.href = "./login.php";
                            }, 2000);
                        });
                        </script>
                    ';
                } else{
                    if($val == "conflict"){
                        echo '
                        <div class="alert alert-danger">
                            <strong>Tài khoản</strong> đã có người sử dụng.
                        </div>
                        ';
                        echo '
                            <script>
                            jQuery(document).ready(function(){
                                setTimeout(() => {
                                    $(".alert").hide();
                                }, 2000);
                            });
                            </script>
                        ';
                    }
                    if($val == "404"){
                        echo '
                        <div class="alert alert-danger">
                            <strong>Đã xảy ra</strong> lỗi va chạm không xác định.
                        </div>
                        ';
                        echo '
                            <script>
                            jQuery(document).ready(function(){
                                setTimeout(() => {
                                    $(".alert").hide();
                                }, 2000);
                            });
                            </script>
                        ';
                    }
                }
            }
        ?>
    </div>
</body>
<?php if(is_resource($con)) mysqli_close($con); ?>
</html>