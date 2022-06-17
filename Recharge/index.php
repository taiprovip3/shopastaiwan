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
    <title>ShopAsTaiwan.x10.bz | Nạp tiền</title>
    <!-- Thư viện bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Thư viện jQuery, ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Thư viện Font awesome 5 -->
    <script src="https://kit.fontawesome.com/ad778f42b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Resources/css/common.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../Resources/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Resources/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Resources/img/favicon-16x16.png">
    <link rel="manifest" href="../Resources/img/site.webmanifest">

    <!-- Thư viện recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
    <!-- Thư viện sweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Thư viện WOW animation -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
    <script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>
    <!-- Thư viện Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
    <script> new WOW().init(); </script>
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
                        <li><a class="dropdown-item" href="../Templates/register.php">Tạo tài khoản</a></li>
                        <li><a class="dropdown-item" href="../Templates/login.php">Đăng nhập</a></li>
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
                        <a class="nav-link" href="../Templates/shop.php">Shop Acc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../Recharge/index.php">Nạp Tiền</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Trợ Giúp</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Templates/contact.php">Liên hệ</a></li>
                            <li><a class="dropdown-item" href="../Templates/help.php">Hướng dẫn</a></li>
                        </ul>
                    </li>
                    <?php
                        if(isset($_SESSION['username'])){
                            if($_SESSION['username'] == "taiproduaxe"){
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="../Templates/admin.php">ADMIN</a>
                                </li>
                                ';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Status -->
        <div class="row">
            <div class="col-lg-12 text-center text-warning">
                <div id="status"></div>
            </div>
        </div>
        <!-- Recharge -->
        <style>
            #recharge-left input,#recharge-left select{
                width: 100%;
                padding: 8px;
                outline: none;
            }
        </style>
        <div class="row">
            <div class="col-lg-6 p-5" id="recharge-left">
                <form method="POST" action="#" id="myform">
                <div class="form-group mt-1 mb-1">
                    <label for="username">Chọn người dùng:</label><br>
                    <select name="username" id="username" required>
                        <?php
                            if(isset($_SESSION['username'])){
                                echo '
                                <option value="'.$_SESSION["username"].'">'.$_SESSION["username"].'</option>
                                ';
                            } else{
                                echo '
                                <option value="">Bạn chưa đăng nhập</option>
                                ';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-1 mb-1">
                    <label for="card_type">Chọn loại thẻ:</label><br>
                    <select name="card_type" id="card_type" required>
                    <option value="">Chưa chọn loại thẻ</option>
					<?php 
	                    $cdurl = curl_init("https://thesieutoc.net/card_info.php"); 
                       	curl_setopt($cdurl, CURLOPT_FAILONERROR, true); 
	                    curl_setopt($cdurl, CURLOPT_FOLLOWLOCATION, true); 
	                    curl_setopt($cdurl, CURLOPT_RETURNTRANSFER, true); 
						curl_setopt($cdurl,CURLOPT_CAINFO, __DIR__ .'/api/curl-ca-bundle.crt');
						curl_setopt($cdurl,CURLOPT_CAPATH, __DIR__ .'/api/curl-ca-bundle.crt');
	                    $obj = json_decode(curl_exec($cdurl), true); 
	                    curl_close($cdurl);
						$length = count($obj);
						for ($i = 0; $i < $length; $i++) {
							if ($obj[$i]['status'] == 1){
								echo '<option value="'.$obj[$i]['name'].'">'.$obj[$i]['name'].' ('.$obj[$i]['chietkhau'].'%)</option> ';
							}
						}
					?>
                    </select>
                </div>
                <div class="form-group mt-1 mb-1">
                    <label for="card_amount">Chọn mệnh giá:</label><br>
                    <select name="card_amount" id="card_amount" required>
                        <option value="">Chưa chọn mệnh giá</option>
                        <option value="10000">10.000</option>
                        <option value="20000">20.000</option>
                        <option value="30000">30.000 </option>
                        <option value="50000">50.000</option>
                        <option value="100000">100.000</option>
                        <option value="200000">200.000</option>
                        <option value="300000">300.000</option>
                        <option value="500000">500.000</option>
                        <option value="1000000">1.000.000</option>
                    </select>
                </div>
                <div class="form-group mt-1 mb-1">
                    <label for="serial">Số seri:</label><br>
                    <input type="text" name="serial" id="serial" required placeholder="Số seri trên thẻ" />
                </div>
                <div class="form-group mt-1 mb-1">
                    <label for="pin">Mã thẻ:</label><br>
                    <input type="text" name="pin" id="pin" required placeholder="Mã pin (phần cào)" />
                </div>
                <button type="submit" class="btn btn-success" name="submit">NẠP NGAY</button>
                </form>
                <script type="text/javascript">
                $("#myform").submit(function(e) {
                    $("#status").html("<img src='./assets/load.gif' width='30%' />");
                    e.preventDefault();
                    $.ajax({
                            url: "./ajax/card.php",
                            type: 'post',
                            data: $("#myform").serialize(),
                            success: function(data) {
                                $("#status").html(data);
                                document.getElementById("myform").reset(); 
                                $("#load_hs").load("./ajax/history.php");
                            }
                    });

                });
                </script>
            </div>
            <div class="col-lg-6 border mt-5" id="recharge-right">
                <code>Lịch sử nạp tiền (toàn server):</code>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm mt-1">
                        <thead class="text-white">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Thành viên</th>
                                <th scope="col">Mệnh giá</th>
                                <th scope="col">Thẻ</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include './ajax/history.php'; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- end container -->
</body>
<!-- Thư viện popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>
    // toastr.error('Nội dung lỗi.', 'Gặp lỗi!')
</script>
<?php if(is_resource($con)) mysqli_close($con); ?>
</html>