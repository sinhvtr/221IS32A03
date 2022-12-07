<?php
$tenLoaiHang = $_POST['ten_loai_hang'];
$moTa = $_POST['mo_ta'];
// echo $tenLoaiHang;

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mis_cua_hang';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `mis_loai_hang` (`id`, `ten_loai_hang`, `mo_ta`) VALUES (NULL, '". $tenLoaiHang ."', '". $moTa ."')";

// echo $sql;

if ($conn->query($sql)){
    echo "Thêm mới thành công";
}
else{
    echo "Thêm mới thất bại";
}
?>