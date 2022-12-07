<html>
    <head>
        <title>Thêm mặt hàng</title>
        <meta charset="utf-8" />
        <script src="jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <h1>Thêm mặt hàng</h1>
            <form method="post" action="thuc_hien_them_mat_hang.php">
                <label class="form-label">Tên mặt hàng</label>
                <input class="form-control" name="ten_mat_hang" type="text">
                <br>
                <label class="form-label">Mô tả</label>
                <input class="form-control" name="mo_ta" type="text">
                <br>
                <label class="form-label">Hình ảnh</label>
                <input class="form-control" name="hinh_anh" type="text">
                <br>
                <label class="form-label">Giá bán</label>
                <input class="form-control" name="gia_ban" type="text">
                <br>
                <select>
                    <option>Máy tính xách tay</option>
                    <option>Máy tính để bàn</option>
                </select>
                <br>
                <input value="Lưu" type="submit">
            </form>
        </div>
    </body>
</html>
