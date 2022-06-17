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
    <title>ShopAsTaiwan.x10.bz | Hướng Dẫn</title>
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
                            <li><a class="dropdown-item" href="#">Hướng dẫn</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Liên hệ</a>
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
        <!-- Help -->
        <div class="row">
            <div class="col-lg-12 mt-5">
                <h2><span class="badge bg-success">1</span> Hướng dẫn nạp tiền tại shop AS Taiwan thành công 100%</h2>
                <p>Step 1: Truy cập trang nạp tiền ShopAsTaiwan <a href="../Recharge/index.php" target="_blank">tại đây <i class="fa-solid fa-up-right-from-square"></i></a></p>
                <img src="../Resources/img/help1.PNG" alt="HELP">
                <p>Step 2: Chọn tài khoản user cần nạp để xạc định bạn là ai để tiền chạy vào. Nếu chưa đăng nhập hãy chọn mục -> <span class="text-warning">tài khoản</span> -> <span class="text-warning">đăng nhập</span></p>
                <img src="../Resources/img/help2.PNG" alt="HELP">
                <p>Step 3: Chọn loại thẻ cào có hỗ trợ nạp trong danh sách</p>
                <img src="../Resources/img/help3.PNG" alt="HELP">
                <p>Step 4: Chọn mệnh giá đúng</p>
                <img src="../Resources/img/help4.PNG" alt="HELP">
                <ul> <i>Lưu ý</i>
                    <li>Nếu chọn mệnh giá sai có thể dẫn đến thẻ bị mất giá trị. Admin sẽ không chịu tránh nhiệm nên hãy cẩn thận một chút.</li>
                </ul>
                <p>Step 5: Nhập số seri, một chuỗi số dài có sẵn trên thẻ, hãy mò xem</p>
                <img src="../Resources/img/help5.PNG" alt="HELP">
                <p>Step 6: Nhập phần mã PIN vào. Mã pin là phần cạo lớp bạc mỏng trên thẻ sẽ hiện ra các con số.</p>
                <img src="../Resources/img/help6.PNG" alt="HELP"> -> <i>giống hình</i> ->
                <img src="../Resources/img/help7.PNG" alt="HELP">
                <p>Step 7: Nhấn nạp ngay và chờ đợi.</p>
                <ul> <i>Lưu ý</i>
                    <li>Nếu thẻ nạp được và thông báo đợi thì sau vài giây bạn có thể reload lại trang và xem lại lịch sử nạp.</li>
                    <li>Trường hợp thẻ đúng và chọn thông tin đúng và bạn đã kiểm tra kỹ mà báo thất bại thì có thể do các lỗi sau đây:
                        <ol>Bạn nhập sai lệnh, hoặc thiếu một con số nào đó trong số seri hoặc mã pin</ol>
                        <ol>Nhầm chữ hoa và chữ thường do nút Capslock</ol>
                        <ol>Chọn sai loại thẻ hoặc mệnh giá</ol>
                        <ol>Các trường hợp này sẽ không có cách giải quyết. Có lưu log làm bằng chứng nếu bạn kiện.</ol>
                    </li>
                </ul>
                <span class="text-success">CHÚC BẠN THÀNH CÔNG ^^!</span>
                <h2><span class="badge bg-info">2</span> Hướng dẫn mua acc tại shop AS Taiwan</h2>
                <p>Step 1: Truy cập shop acc ShopAsTaiwan <a href="./shop.php" target="_blank">tại đây <i class="fa-solid fa-up-right-from-square"></i></a></p>
                <p>Step 2: Đăng nhập tài khoản thành viên sau khi thăm quan acc vừa ý. Nếu chưa đăng nhập hãy chọn mục -> <span class="text-warning">tài khoản</span> -> <span class="text-warning">đăng nhập</span></p>
                <p>Step 3: Nếu bạn muốn mua nóng thì hãy nhấp vào nút giá mua và xác nhận lại. Trường hợp bạn muốn mua acc kỹ (check kỹ lưỡng trước khi mua) thì hãy <a href="./contact.php">liên hệ</a> trực tiếp facebook của mình. Không cần phải mua trên này. Ở facebook mình sẽ chụp thêm hình ảnh chi tiết hoặc nói rõ hơn cho bạn về con acc theo mã bạn chọn.</p>
                <p>Step 4: Xác nhận mua</p>
                <ul> <i>Lưu ý</i>
                    <li>Khi đã xác nhận mua. Acc không thể hoàn trả lại thành tiền (no refund) nha. Nên hãy tính kỹ trước khi mua.</li>
                </ul>
                <p>Step 5: Sau khi xác nhận mua thông tin acc sẽ hiện ra. Bạn hãy nhanh tay copy thông tin lưu về đâu đó trong máy. vd: notepad++ để tránh quên. Trường hợp quên cũng có thể vào lại lịch sử giao dịch xem.</p>
                <p>Step 6: Vào game AS đăng nhập thưởng thức.</p>
                <ul> <i>Lưu ý</i>
                    <li>Acc đã mua không thể xin đổi bạn nhé.</li>
                    <li>Trường hợp bạn muốn bán lại acc đã mua tại shop. Giá chắc chắn sẽ bèo đi bởi vì đó là hàng đã bóc tem.</li>
                </ul>
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