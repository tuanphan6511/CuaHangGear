<?php require_once("include/Header.php");
?>

<body>
    <div class="container-fuild">
        <img src="images/bannertop.jpg" class="img-fluid" style="width: 100%; height: 5rem;">
        <div class="row">
            <div class="col-sm-2"></div>
            
            <div class="col-sm-8 mb-5">
                <?php require("include/navbar.php") ?>
                <div class="container">
                    <div class="row mt-5 mb-3" style="color:black; font-style:italic;">
                        <h3>Đặt hàng của bạn</h3>
                    </div>
                    <?php
                       
                        if(isset($_SESSION["nguoidung"]))
                        {
                        $diachind=$dc->laydiachitheoidnd($_SESSION["nguoidung"]["id"]) ;
                    ?>
                        
                        <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" name="txthoten" value="<?php echo $_SESSION["nguoidung"]["hoten"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="txtemail" value="<?php echo $_SESSION["nguoidung"]["email"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input type="number" class="form-control" name="txtsdt" value="<?php echo $_SESSION["nguoidung"]["sodienthoai"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" name="txtdiachi" value="<?php echo $diachind["diachi"] ?>" required>
                                </div>
                                
                                <input type="hidden" name="action" value="dathang">


                    <?php
                        }else{
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" name="txthoten" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="txtemail" required>
                                </div>
                                <div class="form-group">
                                    <label>SĐT</label>
                                    <input type="number" class="form-control" name="txtsdt" required>
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" class="form-control" name="txtdiachi" required>
                                </div>
                                <input type="hidden" name="action" value="dathang">
                            <?php 
                            }
                            ?>



                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1;
                                        foreach ($giohang as $mathang => $mh) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $stt; ?></th>
                                                <td><img src="<?php echo $mh["hinhanh1"]; ?>" alt="<?php echo $mh["tenmathang"]; ?>" style="width: 40pt; height: 40pt;"></td>
                                                <td><?php echo $mh["tenmathang"] ?></td>
                                                <td><?php echo $mh["giaban"] ?></td>
                                                <td> <?php echo $mh["soluong"] ?></td>
                                                <td><?php echo number_format($mh["sotien"]) ?></td>
                                                
                                            </tr>
                                        <?php
                                            $stt++;
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="5" style="color:red;">Tổng tiền</td>

                                            <td><?php echo number_format(tinhtiengiohang()) ?></td>

                                        </tr>
                                        

                                    </tbody>
                                </table>

                                <input style="width:100%;" type="submit" class="btn btn-primary" value="Đặt hàng">

                            </form>
                        </div>
                    </div>
                </div>






            </div>
            
            <div class="col-sm-2"></div>
        </div>

    </div>


    <?php require("include/Footer.php") ?>
</body>

</html>