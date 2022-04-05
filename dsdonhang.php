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
                        <h3>Danh sách đơn hàng đã đặt</h3>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá bán</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hủy món hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;
                             $dh = new DONHANG();
                             
                             $dssp = $dh->laythongtindonhangtheoidnguoidung($_SESSION["nguoidung"]["id"]);
                             foreach ($dssp as $d) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $stt; ?></th>
                                    <td><img src="<?php echo $d["hinhanh1"]; ?>" alt="<?php echo $d["tenmathang"]; ?>" style="width: 40pt; height: 40pt;"></td>
                                    <td><?php echo $d["tenmathang"] ?></td>
                                    <td><?php echo $d["dongia"] ?></td>
                                    <td><?php echo $d["soluong"] ?></td>
                                    <td><?php echo number_format($d["thanhtien"]) ?></td>
                                    <td><?php if($d["trangthai"]==1) echo "Đã tiếp nhận"; else if($d["trangthai"]==2) echo "Đơn hàng đã bị hủy với lí do: ".$d["ghichu"]; else echo "Chờ tiếp nhận"; ?></td>
                                    <td><?php if($d["trangthai"]==0) 
                                    {
                                        ?>
                                            <a href="?action=xoadonhangsanpham&id=<?php echo $d["id"] ?>"><i class="far fa-trash-alt"></i></a>
                                        <?php
                                    }
                                    ?></td>
                                </tr>
                            <?php
                                $stt++;
                            }
                            ?>
                            
                           

                        </tbody>
                    </table>
                  




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