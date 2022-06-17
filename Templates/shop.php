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
    <title>ShopAsTaiwan.x10.bz | Shop Acc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ad778f42b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Resources/css/common.css">
    <link rel="stylesheet" href="../Resources/css/shop.css">
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
                        <a class="nav-link active" href="#">Shop Acc</a>
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
        <!-- Statistic -->
        <div class="row">
            <div class="col-lg-2 mt-3 border small">
                <ul class="list-unstyled">
                    <?php include '../Utilities/Statistic.php'; ?>
                    <code>Thống kê nhỏ:</code>
                    <li>&emsp;Kho acc còn: <b><code><?php echo $accchuaban; ?></code></b>
                        <ol><i class="fa-solid fa-check text-success"></i> Acc còn gmail: <code><?php echo $acccongmail; ?></code></ol>
                        <ol><i class="fa-solid fa-xmark text-warning"></i> Acc mất gmail: <code><?php echo $accmatgmail; ?></code></ol>
                    </li>
                    <li>&emsp;Đã bán: <b><code><?php echo $accdaban; ?></code></b></li>
                </ul>
            </div>
        </div>
        <!-- Shop -->
        <div class="row">
            <div class="col-lg-12 d-flex p-3 mt-3 flex-wrap justify-content-around">
                <?php include '../ClientController/LoadShopAccount.php'; ?>
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
                            <strong>Thanh toán</strong> thành công. Hãy nhanh đóng kiểm tra lịch sử và thay đổi mật khẩu bạn nhé.
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
                    if($val == "noeng"){
                        echo '
                        <div class="alert alert-danger">
                            <strong>Bạn không</strong> có đủ tiền để mua.
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
                    if($val == "nolog"){
                        echo '
                        <div class="alert alert-danger">
                            <strong>Vui lòng</strong> đăng nhập tài khoản.
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

    <!-- ConfirmBox -->
    <div class="modal" id="confirm-box">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="../ClientController/buy.php" method="post">
                    <div class="d-flex p-1">
                        <div class="col-lg-6 p-3">
                            <input type="hidden" name="acc-id">
                            <button type="button" class="btn btn-sm text-success" id="accept">Xác nhận</button>
                            <button type="button" class="btn btn-sm text-danger" data-bs-dismiss="modal">Huỷ bỏ</button>
                        </div>
                        <div class="col-lg-6 text-dark">
                            Hành động ngu ngốc này sẽ không hoàn trả lại bất cứ 1 đồng xu (no refund). Bạn chắc chắn chưa?
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Info account bought -->
    <div id="acc-bought" class="text-center border small bg-success p-3 rounded">
        <?php
            if(isset($_GET['acc_id'])){
                if(isset($_SESSION['username'])){
                    $acc_id = $_GET['acc_id'];
                    $username = $_SESSION['username'];
                    $sql = "select * from accounts a join trans_acc b on a.id = b.acc_id where b.username = '$username' and b.acc_id = $acc_id";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_array($result);
                        echo '
                            <i class="fa-solid fa-xmark" style="float: right;" id="close-acc-bought"></i>
                            <span>Giao dịch thành công</a><br>
                            <span>Mã tài khoản: #'.$row["id"].'</span><br>
                            <span>Tên đăng nhập: <code>'.$row["acc_user"].'</code></span><br>
                            <span>Mật khẩu: <code>'.$row["acc_password"].'</code></span><br>
                            '. ($row["user_email"] == NULL ? "" : "<a>Email: <code>".$row["user_email"]."</code></a><br>") .'
                            <br>
                            <i>Nhắc nhở:<br>cẩn thận xung quanh kẻo có người nhìn trộm.</i>
                        ';
                        echo '
                            <script>
                            jQuery(document).ready(function(){
                                $("#acc-bought").show();
                            });
                            </script>
                        ';
                    }
                }
            }
        ?>
    </div>
</body>
<script src="../Resources/js/shop.js"></script>
<?php if(is_resource($con)) mysqli_close($con); ?>
</html>