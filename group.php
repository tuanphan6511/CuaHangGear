<?php require_once("include/Header.php");






?>

<body>
    <div class="container-fuild">
        <img src="images/bannertop.jpg" class="img-fluid" style="width: 100%; height: 5rem;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-1"><a href="?action=detail&id=5"><img src="images/qc3.png" class="img-fluid mt-5 sticky-top" alt="Tên hàng"></a></div>
            <!-- Phần thân trình bày-->
            <div class="col-sm-8">
                <?php require("include/navbar.php") ?>
                <?php
                if (isset($_GET["m"])) {
                    $danhmuc_id = $_GET["m"];

                ?>
                    <div class="container-fuild">
                        <div class="row">
                            <h4>
                                <p class=" mt-5"><a style="color:red;" href=""><?php echo $danhmuchientai["tendanhmuc"] ?></a></p>
                            </h4>
                            <hr width="100%" class="center" color="blue" />
                            <?php foreach ($mathangtheodanhmuc as $m) :

                            ?>
                                <div class="col-sm-3">

                                    <div class="card" style="width: 17rem;height: 24rem; ">
                                        <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                            <div class="card-header" style="width: 16rem; height: 5rem;"><?php echo $m["tenmathang"]; ?></div>
                                        </a>
                                        <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                            <img class="card-img-top" src="<?php echo $m["hinhanh1"] ?>" style="width: 10rem; height: 10rem;" alt="<?php echo $m["mota"] ?>">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title" style="width: 16rem;height: 2rem;"><?php echo number_format($m["giaban"]); ?>đ</h5>
                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                            <div><a style="width:45%;" href="?action=detail&id=<?php echo $m["id"]; ?>" class="btn btn-primary">Mua Ngay</a>
                                                <a style="width:50%;" href="?action=chovaogio&id=<?php echo $m["id"]; ?>&soluong=1" class="btn btn-warning">Cho vào giỏ</a>
                                            </div>
                                        </div>
                                    </div>
                                    </br>
                                </div>
                            <?php
                            endforeach; ?>
                        </div>
     
                        <div class="row">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="index.php?m=<?php echo $danhmuc_id; ?>&action=group&trang=1">Đầu</a></li>
                                <?php for ($i = 1; $i <= $tongsotrang; $i++) {
                                    if ($tranghh == $i) {
                                ?>
                                        <li class="page-item active"><a class="page-link" href="?m=<?php echo $danhmuc_id; ?>&action=group&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="page-item"><a class="page-link" href="?m=<?php echo $danhmuc_id; ?>&action=group&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php
                                    }
                                } ?>
                                <li class="page-item"><a class="page-link" href="?m=<?php echo $danhmuc_id; ?>&action=group&trang=<?php echo $tongsotrang ?>">Cuối</a></li>
                            </ul>
                            </nav>
                        </div>
                    </div>


                    </br>
                <?php
                }
                if (isset($_GET["h"])) {
                    $hang_id = $_GET["h"];
                ?>
                    <div class="container-fuild">
                        <div class="row">
                            <h4>
                                <p class=" mt-5"><a style="color:red;" href=""><?php echo $hanghientai["tenhang"] ?></a></p>
                            </h4>
                            <hr width="100%" class="center" color="blue" />
                            <?php foreach ($mathangtheohang as $m) :

                            ?>
                                <div class="col-sm-3">

                                    <div class="card" style="width: 18rem;height: 24rem; ">
                                        <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                            <div class="card-header" style="width: 16rem; height: 5rem;"><?php echo $m["tenmathang"]; ?></div>
                                        </a>
                                        <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                            <img class="card-img-top" src="<?php echo $m["hinhanh1"] ?>" style="width: 10rem; height: 10rem;" alt="<?php echo $m["mota"] ?>">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title" style="width: 16rem;height: 2rem;"><?php echo number_format($m["giaban"]); ?>đ</h5>
                                            <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                            <div><a style="width:45%;" href="?action=detail&id=<?php echo $m["id"]; ?>" class="btn btn-primary">Mua Ngay</a>
                                            <a  style="width:50%;" href="?action=chovaogio&id=<?php echo $m["id"]; ?>&soluong=1" class="btn btn-warning">Cho vào giỏ</a>
                                            </div>
                                        </div>
                                    </div>
                                    </br>
                                </div>
                            <?php
                            endforeach; ?>


                        </div>
                        <div class="row">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="index.php?h=<?php echo $hang_id; ?>&action=group&trang=1">Đầu</a></li>
                                <?php for ($i = 1; $i <= $tongsotrang; $i++) {
                                    if ($tranghh == $i) {
                                ?>
                                        <li class="page-item active"><a class="page-link" href="?h=<?php echo $hang_id; ?>&action=group&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="page-item"><a class="page-link" href="?h=<?php echo $hang_id; ?>&action=group&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php
                                    }
                                } ?>
                                <li class="page-item"><a class="page-link" href="?h=<?php echo $hang_id; ?>&action=group&trang=<?php echo $tongsotrang ?>">Cuối</a></li>
                            </ul>
                            </nav>
                        </div>
                    </div>
                <?php
                }
                if (isset($_POST["txttimkiem"])) {
                ?>
                    <div class="container-fuild">
                        <div class="row">
                            <h4>
                                <p class=" mt-5"><a style="color:red;" href=""><?php echo $_POST["txttimkiem"] ?></a></p>
                            </h4>
                            <hr width="100%" class="center" color="blue" />
                            <?php foreach ($kqtimkiem as $m) :

                            ?>
                                <div class="col-sm-3">

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
                                            <div><a href="?action=detail&id=<?php echo $m["id"]; ?>" class="btn btn-primary">Mua Ngay</a><a href="#" class="btn btn-warning">Cho vào giỏ</a></div>
                                        </div>
                                    </div>
                                    </br>
                                </div>
                            <?php
                            endforeach; ?>


                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
            <!-- kết Phần thân trình bày-->
            <div class="col-sm-1"><a href="?action=detail&id=7"><img src="images/qc4.png" class="img-fluid mt-5 sticky-top" alt="Tên hàng"></a></div>
            <div class="col-sm-1"></div>
        </div>

    </div>

    <?php require("include/Footer.php") ?>
</body>

</html>