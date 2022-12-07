<?php
$id = $_GET['id'];
// echo $id;

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mis_cua_hang';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mis_loai_hang WHERE id = ".$id;
// echo $sql;
$ketquatruyvan = $conn->query($sql);
if ($ketquatruyvan->num_rows > 0){
    while ($loaihang = $ketquatruyvan->fetch_assoc()){
        $tenLoaiHang = $loaihang['ten_loai_hang'];
        $moTa = $loaihang['mo_ta'];
    }
}
?>
<html>
    <head>
        <title>Thêm mới loại hàng</title>
    </head>
    <body>
        <h2>Thêm mới loại hàng</h2>
        <form method="post" action="thuc_hien_them_loai_hang.php">
            <label>Tên loại hàng</label>
            <input name="ten_loai_hang" type="text" value="<?php echo $tenLoaiHang;?>">
            <br>
            <label>Mô tả</label>
            <input name="mo_ta" type="text">
            <br>
            <input value="Lưu" type="submit">
        </form>
    </body>
</html>