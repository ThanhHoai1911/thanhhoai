<?php
session_start();
include("config/config.php");
if(isset($_POST['dangnhap'])){
    $taikhoan=$_POST['username'];
    $matkhau=md5($_POST['password']);
    $sql="SELECT * FROM admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
    $row=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($row);
    if($count> 0){
        $_SESSION['dangnhap']=$taikhoan;
        header('Location:index.php');
    }else{
        echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng");</script>';
        header('Location:login.php');
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập admin</title>
    <style type=text/css>
        body {
            background: #f2f2f2;
        }

        .wraper_login {
            width: 28%;
            margin: 0 auto;
        }

        table.table_login {
            width: 100%
        }

        table.table_login tr td {
            padding: 5px;
        }
    </style>
</head>

<body>
<div class="wraper_login">
    <form action="" autocomplete="" method="POSt">
        <table border="1" class="table_login" style="text-align:center;border-collapse:collapse;">
            <tr>
                <td colspan="2">
                    <h3>Đăng nhập admin</h3>
                </td>
            </tr>
            <tr>
                <td>Tài khoản</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="dangnhap" value="Đăng nhập">
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>