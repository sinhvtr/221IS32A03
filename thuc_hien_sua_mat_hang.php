<?php
$id=$_POST['id'];
$tenMatHang= $_POST['ten_mat_hang'];
$moTa= $_POST['mo_ta'];
//$hinhAnh = $_POST['hinh_anh'];
$giaBan = $_POST['gia_ban'];
$loaiHangID = $_POST['loai_hang_id'];

$servername="localhost";
$username="root";
$password="";
$dbname="mis_cua_hang";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die ("Connection failed: ".$conn->connect_error);
}

mysqli_query($conn,'set names utf8');
$sql =" UPDATE `mis_mat_hang` 
        SET `ten_mat_hang`='". $tenMatHang . "',
            `mo_ta`='" . $moTa . "',
            `gia_ban`='".$giaBan."',
            `loai_hang_id`='".$loaiHangID."'
        WHERE `id`=".$id;
        
if($conn->query($sql)){
    echo "Sửa thành công";
    echo "
        <script>
        window.location = 'danh_sach_mat_hang.php';
        </script>
    ";
}
else {
    echo "Không sửa được";
    echo "
        <script>
        window.location = 'danh_sach_mat_hang.php';
        </script>
    ";
}
?>
