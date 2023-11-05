<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
include('ketnoi.php');
$con;
$p = new clsKetnoi();
$p -> ketnoiDB($con);

  
//Lấy dữ liệu nhập vào
$tenDangNhap = addslashes($_POST['username']);
$matKhau = addslashes($_POST['password']);
  
//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
if (!$tenDangNhap || !$matKhau) {
    echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.')</script>";
exit;
}
  
// mã hóa pasword
// $password = md5($password);
  
//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT * FROM taikhoan where tenDangNhap='$tenDangNhap'";
$result = mysqli_query($con, $query) or die( mysqli_error($con));
$row = mysqli_fetch_array($result);

if ($tenDangNhap != isset($row['tenDangNhap'])) {
    echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!')</script>";
}elseif($matKhau != $row['matKhau']){
    echo "<script>alert('Mật khẩu không đúng!')</script>";
}
else {
    $_SESSION['tenDangNhap'] = $tenDangNhap;
    echo "<script>alert('Xin chào " .$row['chuThich']. ". Bạn đã đăng nhập thành công.')</script>";
    if($row['loaiTK'] == 0){
        echo header("refresh:0; url= Model/BGD/BGD.html");
        exit;
    }elseif($row['loaiTK'] == 1){
        echo header("refresh:0; url= Model/QLK/QLK.html");
        exit;
    }elseif($row['loaiTK'] == 2){
        echo header("refresh:0; url= Model/BPSXBH/BPSXBH.html");
        exit;
    }
    elseif($row['loaiTK'] == 3){
        echo header("refresh:0; url= Model/NVK/NVK.html");
        exit;    
    }else{
        die();
        $con->close();
    }
    // die();
    // $connect->close();
}
  
//Lấy mật khẩu trong database ra
// $row = mysqli_fetch_array($result);
  
// //So sánh 2 mật khẩu có trùng khớp hay không
// if ($password != $row['password']) {
// echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
// exit;
// }
  
//Lưu tên đăng nhập
// $_SESSION['username'] = $username;
// echo "Xin chào <b>" .$username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
// die();
// $connect->close();
}