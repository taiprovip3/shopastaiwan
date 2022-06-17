<?php
    session_start();
    include './Database/connectDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ShopAsTaiwan mạng lưới server avatar star hàng đầu việt nam. Đa năng, toàn diện và uy tín 100%">
    <title>ShopAsTaiwan.x10.bz | Trang Chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ad778f42b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./Resources/css/common.css">
    <link rel="stylesheet" href="./Resources/css/index.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./Resources/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./Resources/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./Resources/img/favicon-16x16.png">
    <link rel="manifest" href="./Resources/img/site.webmanifest">
</head>
<body>
    <!-- Authen {fixed} -->
    <div id="authen">
        <?php
            if(isset($_SESSION['username'])){
                include './Utilities/GetUserBalance.php';
                echo '
                    <div class="small text-center p-1">
                        <a href="./Templates/history.php" class="text-reset"><i class="fas fa-user-circle fa-2x"></i></a><br>
                        <code><b>'.getUserBalance($_SESSION['username'],$con).'</b> vnđ</code><br>
                        <a href="./Utilities/logout.php">Logout</a>
                    </div>
                ';
            } else{
                echo '
                <li class="nav-item dropdown list-unstyled">
                    <a class="nav-link dropdown-toggle text-warning" data-bs-toggle="dropdown" href="#">Tài Khoản</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./Templates/register.php">Tạo tài khoản</a></li>
                        <li><a class="dropdown-item" href="./Templates/login.php">Đăng nhập</a></li>
                    </ul>
                </li>
                ';
            }
        ?>
    </div>

    <div class="container-fluid">
        <!-- Nav -->
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Templates/shop.php">Shop Acc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Recharge/index.php">Nạp Tiền</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trợ Giúp</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./Templates/contact.php">Liên hệ</a></li>
                            <li><a class="dropdown-item" href="./Templates/help.php">Hướng dẫn</a></li>
                        </ul>
                    </li>
                    <?php
                        if(isset($_SESSION['username'])){
                            if($_SESSION['username'] == "taiproduaxe"){
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="./Templates/admin.php">ADMIN</a>
                                </li>
                                ';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Slide show -->
        <div class="row">
            <div class="col-lg-12 text-center mt-1 mb-1">
                <div>
                    <img src="./Resources/img/slideshow1.png" alt="LOGO" width="50%" class="mySlides w3-animate-left">
                    <img src="./Resources/img/slideshow2.png" alt="LOGO" width="50%" class="mySlides w3-animate-right">
                    <img src="./Resources/img/slideshow3.png" alt="LOGO" width="50%" class="mySlides w3-animate-top">
                    <img src="./Resources/img/slideshow4.png" alt="LOGO" width="50%" class="mySlides w3-animate-bottom">
                    <img src="./Resources/img/slideshow5.png" alt="LOGO" width="50%" class="mySlides w3-animate-top">
                </div>
                <div>
                    <i class="fa-solid fa-minus fa-2x text-info" id="count1"></i>
                    <i class="fa-solid fa-minus fa-2x" id="count2"></i>
                    <i class="fa-solid fa-minus fa-2x" id="count3"></i>
                    <i class="fa-solid fa-minus fa-2x" id="count4"></i>
                    <i class="fa-solid fa-minus fa-2x" id="count5"></i>
                </div>
            </div>
        </div>
        <!-- Demon -->
        <div class="row">
            <div class="col-lg-12">
                <label for="wiki"><b>Giới thiệu</b> <i class="fas fa-holly-berry"></i></label><br>
                <span class="small" id="wiki">- Avatar Star là một trò chơi bắn súng góc nhìn thứ ba nhiều người chơi, trong đó nhiều người chơi khác nhau có thể đối đầu trong các đấu trường kín, sử dụng các nhân vật dễ thương mà bạn có thể cá nhân hóa theo ý thích của mình. Cá nhân hóa nhân vật, một tính năng thiết yếu của bất kỳ trò chơi trực tuyến nào đáng giá, đặc biệt quan trọng trong Avatar Star. Điều đầu tiên bạn phải làm là chọn loại hình đại diện của mình (sát thủ, thiện xạ hoặc người giám hộ), sau đó bạn có thể sử dụng bất kỳ yếu tố nào trong số hàng trăm yếu tố khác nhau theo ý của mình để tạo ra một nhân vật độc đáo.</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-3">
                <label for="website"><b>Shop acc Taiwan</b> <i class="fas fa-gem"></i></label><br>
                <span class="small" id="website">- Do sự trỗi dậy lại của thế giới avatar đến từ trung quốc - thị trấn taiwan. Tuy đã ngừng phát hành tại Việt Nam nhưng avatar star vẫn để lại dấu ấn khó quên trong lòng các game thủ và mong muốn comback trở lại. Chính vì vậy shop acc AS Taiwan xin hỗ trợ bạn các tài khoản bên phía server này với giá cả rất rẽ phù hợp với học sinh, sinh viên. Uy tín 100% giúp bạn có thể trải nghiệp lại game một lần nữa. Admin đã từng giao dịch với rất nhiều game thủ trước đây và đều thành công nên bạn không cần lo lắng về việc lừa đảo.</span>
                <span class="small">- Shop acc hoàn toàn tự động, giao dịch nhanh gọn, bạn chỉ cần có lượng tiền trong tài khoản gốc và ghé thăm shop acc rồi lựa chọn acc tuỳ thích. Shop đang có nhận thu, mua, bán acc qua facebook hoặc zalo hay nhận trung gian trao đổi acc giá rẽ với hình thức ví điện tử "Momo" hoặc chuyển khoản "Ngân hàng" uy tín 100%</span>
            </div>
        </div>
        <!-- Video -->
        <div class="row">
            <div class="col-lg-6 mt-3">
                <label for="website"><b>Review phim</b> <i class="fas fa-photo-video"></i></label><br>
                <div id="iFrameVideo">
                    <iframe src="https://streamable.com/e/4aconj?autoplay=1&nocontrols=1" frameborder="0" allowfullscreen allow="autoplay"></iframe>
                </div>
            </div>
            <div class="col-lg-6 mt-3" style="direction: rtl;">
                <label for="website"><b>Review phim</b> <i class="fas fa-photo-video"></i></label><br>
                <div id="iFrameVideo">
                    <iframe src="https://streamable.com/e/qyjqa8?autoplay=1&nocontrols=1" frameborder="0" allowfullscreen allow="autoplay"></iframe>
                </div>
            </div>
        </div>
        <!-- Comment -->
        <div class="row mt-3">
            <div class="col-lg-4">
                <p><b>Bình luận</b> <i class="fab fa-rocketchat"></i></p>
                <div id="one-cmt" class="d-flex mb-1">
                    <div>
                        <img src="./Resources/img/hove_head.png" alt="ICON" width="50px" class="rounded-circle">
                    </div>
                    <div class="p-1">
                        <a href="./Templates/user-info.php?username=taiproduaxe">taiproduaxe</a><br>
                        <i class="fas fa-pen-square">:</i> Thu mua / bán acc AS Server Taiwan uy tín 100% nha ae.
                    </div>
                </div>
                <?php include './Utilities/GetUserComment.php'; getUserComentLeft($con); ?>
            </div>
            <div class="col-lg-4">
                <form action="./ClientController/comment.php" method="post">
                    <div class="mb-1 mt-3">
                        <textarea id="content" name="content" required maxlength="255" placeholder="Nhập bình luận của bạn vô đây."></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-info btn-sm" name="comment" style="width: 100%;">Bình luận</button>
                </form>
            </div>
            <div class="col-lg-4">
                <?php getUserComentRight($con); ?>
            </div>
        </div>
    </div>

    <!-- Announcer -->
    <div id="announcer">
        <?php
            if(isset($_GET['response'])){
                $val = $_GET['response'];
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
                } else{
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
<script>
    var myIndex = 0;
    var previousIndex = 0;
    carousel();
    function carousel(){
        var i;
        var x = document.getElementsByClassName("mySlides");
        for(i=0; i<x.length; i++){
            x[i].style.display = "none";
        }
        previousIndex = myIndex;
        myIndex++;
        if(myIndex > x.length){
            myIndex = 1;
        }
        x[myIndex-1].style.display = "inline-block";
        $("i[id='count"+myIndex+"']").addClass("text-info");
        $("i[id='count"+previousIndex+"']").removeClass("text-info");
        setTimeout(carousel, 2000);
    }
</script>
<?php if(is_resource($con)) mysqli_close($con); ?>
</html>