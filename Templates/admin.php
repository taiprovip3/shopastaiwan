<?php
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['username'] != "taiproduaxe"){
        header('Location: ../index.php');
    }
    include_once '../Database/connectDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ShopAsTaiwan mạng lưới server avatar star hàng đầu việt nam. Đa năng, toàn diện và uy tín 100%">
    <title>ShopAsTaiwan.x10.bz | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ad778f42b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Resources/css/common.css">
    <link rel="stylesheet" href="../Resources/css/admin.css">
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
                        <li><a class="dropdown-item" href="#">Tạo tài khoản</a></li>
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
                        <a class="nav-link active" href="#">ADMIN</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Admin -->
        <div class="row">
            <div class="col-lg-6 mt-5" id="upload-form">
            <form enctype="multipart/form-data" method="post" action="../AdminController/upload.php">
                <div>
                    <label for="huyenhthoai">Số lượng Súng huyền thoại:</label><br>
                    <input type="number" name="huyenthoai" id="huyenthoai" placeholder="Nhập vào số lượng 1" min="0" required>
                </div>
                <div>
                    <label for="cuchiem">Số lượng Súng cực hiếm:</label><br>
                    <input type="number" name="cuchiem" id="cuchiem" placeholder="Nhập vào số lượng 2" min="0" required>
                </div>
                <div>
                    <label for="hiem">Số lượng Súng hiếm:</label><br>
                    <input type="number" name="hiem" id="hiem" placeholder="Nhập vào số lượng 3" min="0" required>
                </div>
                <div>
                    <label for="br">Lực chiến:</label><br>
                    <input type="number" name="br" id="br" placeholder="Nhập vào lực chiến" min="0" required>
                </div>
                <div>
                    <label for="des1">Mô tả 1:</label><br>
                    <input type="text" name="des1" id="des1" placeholder="Nhập vào mô tả 1" maxlength="255" required>
                </div>
                <div>
                    <label for="des2">Mô tả 2:</label><br>
                    <input type="text" name="des2" id="des2" placeholder="Nhập vào mô tả 2" maxlength="255" required>
                </div>
                <div>
                    <label for="des3">Mô tả 3:</label><br>
                    <input type="text" name="des3" id="des3" placeholder="Nhập vào mô tả 3" maxlength="255" required>
                </div>
                <div>
                    <label for="img">Chọn ảnh đại diện:</label><br>
                    <input type="file" id="img" name="myimg" accept="image/*">
                </div>
                <div>
                    <label for="price">Giá bán (vnđ):</label><br>
                    <input type="number" step="0.1" name="price" id="price" placeholder="Nhập vào giá bán" min="0" required>
                </div>
                <div>
                    <label for="acc_user">Username:</label><br>
                    <input type="text" name="acc_user" id="acc_user" placeholder="Nhập vào tên đăng nhập tài khoản AS" maxlength="255" required>
                </div>
                <div>
                    <label for="acc_password">Password:</label><br>
                    <input type="text" name="acc_password" id="acc_password" placeholder="Nhập vào mật khẩu tài khoản AS" maxlength="255" required>
                </div>
                <div>
                    <label for="user_email">Email:</label><br>
                    <input type="text" name="user_email" id="user_email" placeholder="Nhập vào mật khẩu tài khoản AS" maxlength="255" required>
                </div>
                <input type="submit" value="Đăng tải" name="upload" class="mt-3 btn btn-success btn-lg">
            </form>
            </div>
            <div class="col-lg-6 mt-5" id="upload-detail">
                <form enctype="multipart/form-data" action="../AdminController/upload.php" method="post">
                    <div>
                        <label for="">Chọn acc muốn mô tả chi tiết:</label><br>
                        <select name="acc_id" id="acc_id">
                            <?php
                                $sql = "select id from accounts where is_sold = 0";
                                $result = mysqli_query($con, $sql);
                                $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
                                json_encode($json);
                                $countrow = count($json);
                                for ($i = 0; $i < $countrow; $i++)
                                {
                                    $row = $json["$i"];
                                    echo '
                                    <option value="'.$row["id"].'">Mã tài khoản #'.$row["id"].'</option>
                                    ';
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="img">Chọn ảnh mô tả 1:</label><br>
                        <input type="file" id="img_1" name="img_1" accept="image/*">
                    </div>
                    <div>
                        <label for="title_1">Mô tả ảnh 1</label><br>
                        <textarea name="title_1" id="title_1" placeholder="Nhập vào mô tả cho ảnh 1" maxlength="255" required></textarea>
                    </div>
                    <div>
                        <label for="img">Chọn ảnh mô tả 2:</label><br>
                        <input type="file" id="img_2" name="img_2" accept="image/*">
                    </div>
                    <div>
                        <label for="title_2">Mô tả ảnh 2</label><br>
                        <textarea name="title_2" id="title_2" placeholder="Nhập vào mô tả cho ảnh 2" maxlength="255" required></textarea>
                    </div>
                    <input type="submit" value="Thêm mô tả" name="upload-detail" class="btn btn-success btn-lg">
                </form>
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
                            <strong>Đăng tải</strong> thành công.
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
        ?>
    </div>
</body>
<?php if(is_resource($con)) mysqli_close($con); ?>
</html>