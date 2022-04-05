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
                <div class="container-fuild">
                    <div class="row">
                        <div class="col-sm-8 mb-5">
                            <div id="carouselExampleIndicators" class="carousel slide mt-5 " data-ride="carousel" data-interval="2000">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active " style="width: 100px;"><img class="mt-5 border border-primary" src="<?php echo $mathanghientai["hinhanh1"]; ?>" style="width: 4rem; height: 4rem;"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1" style="width: 100px;"><img class="mt-5 border border-primary" src="<?php echo $mathanghientai["hinhanh2"]; ?>" style="width: 4rem; height: 4rem;"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2" style="width: 100px;"><img class="mt-5 border border-primary" src="<?php echo $mathanghientai["hinhanh3"]; ?>" style="width: 4rem; height: 4rem;"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?php echo $mathanghientai["hinhanh1"]; ?>" alt="<?php echo $mathanghientai["tenmathang"]; ?>" style="width: 20rem; height: 20rem;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo $mathanghientai["hinhanh2"]; ?>" alt="<?php echo $mathanghientai["tenmathang"]; ?>" style="width: 20rem; height: 20rem;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo $mathanghientai["hinhanh3"]; ?>" alt="<?php echo $mathanghientai["tenmathang"]; ?>" style="width: 20rem; height: 20rem;">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-5">
                            <h3><?php echo $mathanghientai["tenmathang"]; ?></h3>

                            <p class="text-danger">Lượt xem: <?php echo $mathanghientai["luotxem"]; ?></p>
                            <h4>
                                <p>Thông tin:</p>
                            </h4>
                            <h6>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;Nhà sản xuất: <?php echo $mathanghientai["nsx"]; ?></p>
                            </h6>
                            <h6>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;Bảo hành: <?php echo $mathanghientai["baohanh"]; ?> tháng</p>
                            </h6>
                            <h6>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;Tình trạng: <?php echo $mathanghientai["tinhtrang"]; ?></p>
                            </h6>
                            <h6>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;Số lượng còn lại: <?php echo $mathanghientai["soluongton"]; ?></p>
                            </h6>
                            <h4>Giá bán: <span class="text-danger"><?php echo number_format($mathanghientai["giaban"]); ?>đ</span></h4>
                            
                            <div>
                                <?php if($mathanghientai["soluongton"]>0){ ?>
                                <form method="post">
                                <div class="form-group row">
                                    <input style="width:50pt;" class="form-control" type="number" name="soluong" min="1" max="<?php echo $mathanghientai["soluongton"]; ?>" required value="1">
                                    <input type="hidden" name="action" value="chovaogio">
                                    <input type="hidden" name="id" value="<?php echo $mathanghientai["id"]; ?>">
                                    <input class="btn btn-info" type="submit" value="Cho vào giỏ">
                                </div>
                                </form>
                               <?php }else{ ?>
                                <h2><b style="color:red;"> Liên Hệ</b></h2>
                                <?php } ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <br />
                <div class="container-fuild mt-5">
                    <div class="row">
                        <div id="accordion" style="width:100%;">
                            <div class="card" style="width:100%;">
                                <div class="card-header" style="width:100%;" id="headingOne">
                                    <h5 class="mb-0" style="text-align:left;">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Bài viết về <?php echo $mathanghientai["tenmathang"]; ?>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse hidden" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="<?php echo $mathanghientai["hinhanh1"]; ?>" alt="<?php echo $mathanghientai["tenmathang"]; ?>" style="width:10rem; height: 10rem;">
                                            </div>
                                            <div class="col-8" style="background-color:azure;">
                                                <p><?php echo $mathanghientai["mota"]; ?></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div id="accordion" style="width:100%;">
                            <div class="card" style="width:100%;">
                                <div class="card-header" style="width:100%;" id="headingOne">
                                    <h5 class="mb-0" style="text-align:left;">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
                                            Đánh giá khách hàng về <?php echo $mathanghientai["tenmathang"]; ?>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse2" class="collapse hidden" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body" style="background-color:azure;">
                                        <div class="row">
                                            <?php
                                            foreach ($danhsachngdung as $nd) {
                                                foreach ($danhgiatheomathang as $dg) {
                                                    if ($nd["id"] == $dg["nguoidung_id"]) {
                                            ?>
                                                        <div class="col-1">
                                                            <img class='rounded-circle' src="<?php echo $nd["hinhanh"]; ?>" alt="" style="width:40px; height: 40px;">
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="row">
                                                                <?php for ($i = 1; $i <= $dg["sosao"]; $i++) {
                                                                ?>
                                                                    <i style="color:yellow;" class="fas fa-star"></i>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php for ($i = 1; $i <= 5 - $dg["sosao"]; $i++) {
                                                                ?>
                                                                    <i class="far fa-star"></i>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="row">
                                                                <p style="color:red;"><?php echo $nd["hoten"]; ?></p>
                                                            </div>



                                                        </div>
                                                        <div class="col-9">
                                                            <p><?php echo $dg["noidung"]; ?></p>
                                                        </div>
                                            <?php

                                                    }
                                                }
                                            }

                                            ?>

                                        </div>
                                        <?php
                                        if (isset($_SESSION["nguoidung"])) {
                                        ?>
                                            <div class="row">
                                                <hr />
                                                <div class="col-1">
                                                    <img class='rounded-circle' src="<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>" alt="" style="width:40px; height: 40px;">
                                                </div>
                                                <div class="col-11">
                                                    <b><?php echo $_SESSION["nguoidung"]["hoten"]; ?><br /> </b>
                                                    <a class="nut" type="button" class="btn btn-primary" data-toggle="modal" data-target="#fbinhluan">Đánh giá sản phẩm</a>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="row">
                                                <a type="button" class="btn btn-success ml-4" href="admin/">Đăng nhập để đánh giá</a>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                </br>
                <div class="container-fuild mt-5">
                    <h3>Các sản phẩm tương tự: </h3>
                    <div class="row">
                        <?php
                        $sosanpham = 0;
                        foreach ($mathangtheodanhmuc as $m) :
                            if ($sosanpham < 4) {
                                if ($m["id"] != $mathanghientai["id"]) {
                                    $sosanpham++;
                        ?>
                                    <div class="col-sm-3 mt-3">
                                        <div class="card" style="width: 16rem;height: 24rem; ">
                                            <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                                <div class="card-header" style="width: 16rem; height: 5rem;"><?php echo $m["tenmathang"]; ?></div>
                                            </a>
                                            <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                                <img class="card-img-top" src="<?php echo $m["hinhanh1"] ?>" style="width: 10rem; height: 10rem;" alt="<?php echo $m["mota"] ?>">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title" style="width: 16rem;height: 2rem;"><?php echo number_format($m["giaban"]); ?>đ</h5>
                                                <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                                <div><a href="?action=detail&id=<?php echo $m["id"]; ?>" class="btn btn-primary">Xem thêm</a>
                                                <a href="?action=chovaogio&id=<?php echo $m["id"]; ?>&soluong=1" class="btn btn-warning">Cho vào giỏ</a></div>
                                            </div>
                                        </div>
                                        </br>
                                    </div>
                        <?php
                                }
                            }
                        endforeach;
                        ?>
                    </div>

                </div>
                </br>
            </div>
            <div class="col-sm-1"><a href="?action=detail&id=7"><img src="images/qc4.png" class="img-fluid mt-5 sticky-top" alt="Tên hàng"></a>
            
        </div>
            <div class="col-sm-1"></div>
        </div>

    </div>

    <!--- binh luan -->
    <div class="modal fade" id="fbinhluan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Bình luận cho sản phẩm <br> <?php echo $mathanghientai["tenmathang"] ?></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <input class="form-control" type="hidden" name="txtidnguoidung" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
                        <div class="form-group">
                            <label>Số sao</label>

                            <select name="sosao" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5" selected>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Nội dung</label>
                            <input class="form-control" type="text" name="txtnoidung" placeholder="Nội dụng đánh giá" required>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="txtidmathang" value="<?php echo $mathanghientai["id"]; ?>">
                            <input type="hidden" name="action" value="danhgia">

                            <div type="hidden">
                                <input class="btn btn-primary" type="submit" value="Đánh giá">
                            </div>



                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <?php require("include/Footer.php") ?>
</body>

</html>