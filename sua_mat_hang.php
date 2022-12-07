<?php
$id = $_GET ['id']; // Lay ID cua mat hang can sua tren URL
// Ket noi CSDL
$servername="localhost";
$username="root";
$password="";
$dbname="mis_cua_hang";
$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die ("Connection failed: ".$conn->connect_error);
}
mysqli_query($conn, 'set names utf8');
// Ket noi CSDL

// Truy van mat hang co ID trung voi ID vua chon
$sql = "SELECT * FROM mis_mat_hang
        WHERE id = ". $id;
$ketQuaTruyVan = $conn->query($sql);
// Truy van mat hang co ID trung voi ID vua chon

// Gan gia tri cho cac bien PHP se su dung de hien thi tren form
if($ketQuaTruyVan->num_rows>0){
    while($matHang= $ketQuaTruyVan->fetch_assoc()){
        $tenMatHang = $matHang['ten_mat_hang'];
        $moTa = $matHang['mo_ta'];
        $hinhAnh= $matHang['hinh_anh'];        
        $giaBan= $matHang['gia_ban'];
        $loaiHangID= $matHang['loai_hang_id'];
    }
}
// Gan gia tri cho cac bien PHP se su dung de hien thi tren form
?>
<html>
    <head>
        <title>Sửa mặt hàng</title>        
        <meta charset="utf-8" http-equiv="content-type" />
        <script src="jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <h1>Sửa mặt hàng</h1>
            <form class="form form-horizontal" method="post" action="thuc_hien_sua_mat_hang.php">
                <div class="form-group">
                    <label class="control-label col-sm-2">Tên mặt hàng </label>
                    <div class="col-sm-10">
                    <input value="<?=$tenMatHang?>" type="text" class="form-control" name="ten_mat_hang" placeholder="Tên loại hàng">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Mô tả</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="mo_ta"><?=$moTa?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Hình ảnh </label>
                    <div class="col-sm-10">
                    <input value="<?=$hinhAnh?>" type="file" class="form-control" name="hinh_anh" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Giá bán </label>
                    <div class="col-sm-10">
                    <input value="<?=$giaBan?>" type="number" class="form-control" name="gia_ban" />
                    </div>
                </div>
                <?php            
                $sql = "SELECT * FROM mis_loai_hang";
                $ketQuaTruyVan = $conn->query($sql);
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-2">Loại hàng </label>
                    <div class="col-sm-10">
                    <select class="form-control" name="loai_hang_id">
                        <option value="0">Chọn loại hàng</option>
                        <?php
                        if($ketQuaTruyVan->num_rows > 0){
                            while($loaiHang = $ketQuaTruyVan->fetch_assoc()){
                                if($loaiHang['id']==$loaiHangID){
                                ?>
                        <option selected="selected" value="<?php echo $loaiHang['id'] ?>"><?php echo $loaiHang['ten_loai_hang']?></option>
                                <?php    
                                }else{
                        ?>
                        <option value="<?php echo $loaiHang['id'] ?>"><?php echo $loaiHang['ten_loai_hang']?></option>
                        <?php
                                }
                            }
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$id?>" />
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input class="btn btn-success" type="submit" value="Lưu" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
