<?php require("header.php");?>

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

$sql = "SELECT mh.id, mh.ten_mat_hang, lh.ten_loai_hang, mh.hinh_anh, mh.gia_ban
        FROM mis_mat_hang AS mh
        INNER JOIN mis_loai_hang AS lh 
            ON mh.loai_hang_id = lh.id
        ORDER BY mh.loai_hang_id";

// echo $sql;

$ketQuaTruyVan = $conn->query($sql);
?>

<?php
if($ketQuaTruyVan->num_rows > 0){
    $i = 0;
    while($matHang = $ketQuaTruyVan->fetch_assoc()){
        if($i%3 == 0){
?>
<div class="container">    
    <div class="row">
<?php
        }
?>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $matHang['ten_mat_hang']; ?></div>
                <div class="panel-body">
                    <img src="assets/images/<?php echo $matHang['hinh_anh']; ?>" class="img-responsive" style="width:100%" alt="Image">
                </div>
                <div class="panel-footer"><?php echo $matHang['gia_ban']; ?></div>
            </div>
        </div>
<?php
        if ($i%3 == 2){
?>
    </div>
</div><br>
<?php
        }
        $i++;
    }
}
?>

<br><br>
<?php require("footer.php");?>