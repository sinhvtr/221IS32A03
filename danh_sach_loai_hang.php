<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mis_cua_hang';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
// $sql = 'SELECT * FROM mis_loai_hang';

// $ketquatruyvan = $conn->query($sql);
// if ($ketquatruyvan->num_rows > 0){
//     while ($loaihang = $ketquatruyvan->fetch_assoc()){
//         var_dump($loaihang);
//         echo "<br>";
//     }
// }
?>
<html>
    <head>
        <title>Danh sách loại hàng</title>
    </head>
    <body>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên loại hàng</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
<?php
$sql = 'SELECT * FROM mis_loai_hang';

$ketquatruyvan = $conn->query($sql);
if ($ketquatruyvan->num_rows > 0){
    $i = 1;
    while ($loaihang = $ketquatruyvan->fetch_assoc()){
?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $loaihang['ten_loai_hang'];?></td>
                <td><?php echo $loaihang['mo_ta'];?></td>
                <td><a href="sua_loai_hang.php?id=<?php echo $loaihang['id'];?>">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
<?php
        $i++;
    }
}
?>
            <tr>
                <td colspan="4"><a href="them_loai_hang.php">Thêm mới loại hàng</a></td>
            </tr>
        </table>
    </body>
</html>