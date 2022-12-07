<html>
    <head>
        <title>Danh sách mặt hàng</title>
        <meta charset="utf-8" http-equiv="content-type" />
        <script src="jquery-3.6.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    </head>
    <body>
<?php
// Ket noi CSDL
$servername="localhost";
$username="root";
$password="";
$dbname="mis_cua_hang";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die ("Connection failed: ".$conn->connect_error);
}

mysqli_query($conn,'set names utf8');
// Ket noi CSDL

$sql = "SELECT mh.id, mh.ten_mat_hang, lh.ten_loai_hang
        FROM mis_mat_hang AS mh
        INNER JOIN mis_loai_hang AS lh 
            ON mh.loai_hang_id = lh.id
        ORDER BY mh.loai_hang_id";

// echo $sql;

$ketQuaTruyVan = $conn->query($sql);
?>
        <div class="container">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Tên mặt hàng</th>
                    <th>Nhóm</th>
                    <th>Thao tác</th>
                </tr>
    <?php
    if($ketQuaTruyVan->num_rows > 0){
        while($matHang = $ketQuaTruyVan->fetch_assoc()){

    ?>
            <tr>
                <td><?php echo $matHang['id']; ?></td>
                <td><?php echo $matHang['ten_mat_hang']; ?></td>
                <td><?php echo $matHang['ten_loai_hang']; ?></td>
                <td>
                    <a class="btn btn-info" href="sua_mat_hang.php?id=<?php echo $matHang['id'];?>">Sửa</a>  
                    <a class="btn btn-danger" href="xoa_mat_hang.php?id=<?php echo $matHang['id'];?>">Xóa</a>
                </td>
            </tr>    
    <?php  
        }
    }
    ?>
            </table>
            <a class="btn btn-success" href="them_mat_hang.php">Thêm mặt hàng</a>
        </div>
    </body>
</html>
