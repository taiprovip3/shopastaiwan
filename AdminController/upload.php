<?php
    if(isset($_POST['upload'])){//Gởi từ form
        include '../Database/connectDB.php';
        $huyenthoai = $_POST['huyenthoai'];
        $cuchiem = $_POST['cuchiem'];
        $hiem = $_POST['hiem'];
        $br = $_POST['br'];
        $des1 = $_POST['des1'];
        $des2 = $_POST['des2'];
        $des3 = $_POST['des3'];
        $name = $_FILES['myimg']['name'];
        $type = $_FILES['myimg']['type'];
        $data = file_get_contents($_FILES['myimg']['tmp_name']);
        $price = $_POST['price'];
        $acc_user = $_POST['acc_user'];
        $acc_password = $_POST['acc_password'];
        $user_email = $_POST['user_email'];
        $sql = "insert into accounts (huyenthoai,cuchiem,hiem,br,des1,des2,des3,img_data,img_type,img_name,price,acc_user,acc_password.user_email) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $con -> prepare($sql);
        $stmt->bind_param("iiiissssss",$huyenthoai,$cuchiem,$hiem,$br,$des1,$des2,$des3,$data,$type,$name,$price,$acc_user,$acc_password,$user_email);
        $stmt->execute();
        header('Location: ../Templates/admin.php?response=success');
        $con -> close();
    }
    if(isset($_POST['upload-detail'])){//Gọi từ form
        include '../Database/connectDB.php';
        $acc_id = $_POST['acc_id'];
        $img_type_1 = $_FILES['img_1']['type'];
        $img_type_2 = $_FILES['img_2']['type'];
        $img_data_1 = file_get_contents($_FILES['img_1']['tmp_name']);
        $img_data_2 = file_get_contents($_FILES['img_2']['tmp_name']);
        $title_1 = $_POST['title_1'];
        $title_2 = $_POST['title_2'];
        $sql = "insert into account_details (img_1,img_2,img_type_1,img_type_2,title_1,title_2,acc_id) values (?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi",$img_data_1,$img_data_2,$img_type_1,$img_type_2,$title_1,$title_2,$acc_id);
        $stmt->execute();
        header('Location: ../Templates/admin.php?response=success');
        // echo $acc_id . $img_type_1 . $img_type_2 . $title_1 . $title_2 . $img_data_2;
        $con -> close();
    }
?>