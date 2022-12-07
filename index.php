<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cửa hàng MIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="jquery-3.6.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Cửa hàng MIS</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>

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

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
