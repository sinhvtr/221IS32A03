<?php
$tenLoaiHang = $_POST['ten_mat_hang'];
$moTa = $_POST['mo_ta'];
$hinhAnh = $_POST['hinh_anh'];
$giaBan = $_POST['gia_ban'];
$loaiHangId = $_POST['loai_hang_id'];
// echo $tenLoaiHang;

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mis_cua_hang';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `mis_mat_hang` (`id`, `ten_mat_hang`, `mo_ta`, `hinh_anh`, `gia_ban`, `loai_hang_id`) VALUES (NULL, '". $tenLoaiHang ."', '". $moTa ."', '". $hinhAnh ."', '". $giaBan ."', '". $loaiHangId ."')";

// echo $sql;

if ($conn->query($sql)){
    echo "Thêm mới thành công";
}
else{
    echo "Thêm mới thất bại";
}
?>