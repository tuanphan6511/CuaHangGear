<?php require_once("include/Header.php");
?>

<body>
    <div class="container-fuild">
        <img src="images/bannertop.jpg" class="img-fluid" style="width: 100%; height: 5rem;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-1"><a href="?action=detail&id=5"><img src="images/qc3.png" class="img-fluid mt-5 sticky-top" alt="Tên hàng"></a></div>
            <div class="col-sm-8">
                <?php require("include/navbar.php") ?>
                <div class="container">
                    <div class="row mt-5 mb-3" style="color:black; font-style:italic;">
                        <h3>Giỏ hàng của bạn</h3>
                    </div>
                    <div class="row" style="margin-bottom:300pt;">
                        <div class="col-12">
                            <?php
                            if (demhangtronggio() == 0) {
                                echo "<p style='color:red; font-size:15pt;'>Không có gì cả <i class='fas fa-sad-tear'></i></p>";
                            } else {
                            ?>
                                <form method="post">
                                    <input type="hidden" name="action" value="capnhatgiohang">
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
                                                    <td><?php require_once("model/mathang.php"); $mhkt= new MATHANG();  ?><input type="number" name="mh[<?php echo $mathang ?>]" value="<?php echo $mh["soluong"] ?>" min="0" max="<?php $bien=$mhkt->kiemtraton($mh["id"]); echo $bien["soluongton"] ?>"><br>Số lượng hiện có: <?php echo $bien["soluongton"] ?></td>

                                                    <td><?php echo number_format($mh["sotien"]);?></td>

                                                </tr>
                                            <?php
                                                $stt++;
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="5" style="color:red;">Tổng tiền</td>

                                                <td><?php echo number_format(tinhtiengiohang()) ?> vnđ</td>

                                            </tr>
                                            <tr>

                                                <td colspan="5">
                                                    Để xóa mặt hàng nhập số lượng = 0 |
                                                    <a href="?action=xoagiohang">Xóa tất cả</a>
                                                </td>
                                                <td>
                                                    <input class="btn btn-warning" type="submit" value="Cập nhật">
                                                    <?php if(isset($_SESSION["nguoidung"]["id"])){ ?>
                                                    <a class="btn btn-danger" href="index.php?action=datmua">Đặt mua</a>
                                                    <?php }else{
                                                    ?>
                                                    <a class="btn btn-danger" href="admin/">Đăng nhập để đặt hàng</a>
                                                    <?php
                                                    } ?>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </form>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>





            </div>
            <div class="col-sm-1"><a href="?action=detail&id=7"><img src="images/qc4.png" class="img-fluid mt-5 sticky-top" alt="Tên hàng"></a></div>
            <div class="col-sm-1"></div>
        </div>

    </div>


    <?php require("include/Footer.php") ?>
</body>

</html>