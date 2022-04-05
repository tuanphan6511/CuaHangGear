<?php require_once("include/Header.php") ?>

<body>
    <div class="container-fuild">
        <img src="images/bannertop.jpg" class="img-fluid" style="width: 100%; height: 5rem;">

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-1 "><a href="?action=detail&id=5"><img src="images/qc3.png" class="img-fluid mt-5 sticky-top" alt="Tên hàng"></a></div>
            <div class="col-sm-8">
                <?php require("include/navbar.php") ?>
                <div class="container-fuild">
                    <div class="row">
                        <div class="col-sm-2">
                            <p>
                                <button style="width: 100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Danh mục
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                <?php $i = 1;
                                    foreach ($danhmuc as $d) : ?>
                                       
                                            <a class="nav-link" href="#item-<?php echo $i;$i++; ?>"><?php echo $d["tendanhmuc"]; ?></a>
                                        
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <p>
                                <button style="width:  100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                Hãng
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample2">
                                <div class="card card-body">
                                <?php
                                    foreach ($hang as $h) : ?>

                                        <a class="nav-link" href="#item-<?php echo $i;
                                                                        $i++; ?>"><?php echo $h["tenhang"]; ?></a>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-sm-10">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a href="?action=detail&id=5">
                                            <img src="images/quangcaogiua1.png" class="d-block w-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="?action=detail&id=7">
                                            <img src="images/quangcaogiua2.png" class="d-block w-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="?action=detail&id=12">
                                            <img src="images/quangcaogiua3.png" class="d-block w-100" alt="...">
                                        </a>
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

                    </div>
                </div>


                </br>

                <div class="container-fuild">
                    <div data-spy="scroll" data-target="#navbar-danhmuc" data-offset="0">
                        <!-- Trinh bay san theo danh muc-->

                        <h4>
                            <p class="mt-5" style="color:red;">Sản phẩm theo danh mục</p>
                        </h4>
                        <hr width="100%" class="center" color="blue" />
                        <?php
                        $ii = 1;
                        foreach ($danhmuc as $d) :
                            $sosanpham = 0;
                        ?>
                            <div id="item-<?php echo $ii;
                                            $ii++; ?>">
                                </br>
                                <h4>
                                    <p><a style="color:black;" href="?action=group&m=<?php echo $d["id"] ?>"><?php echo $d["tendanhmuc"] ?></a></p>
                                </h4>

                                <div class="row">
                                    <?php foreach ($mathang as $m) :
                                        if ($sosanpham < 4) {
                                            if ($m["danhmuc_id"] == $d["id"]) {
                                                $sosanpham++;
                                    ?>
                                                <div class="col-sm-3">

                                                    <div class="card" style="width: 16rem;height: 24rem; ">
                                                        <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                                            <div class="card-header" style="width: 16rem; height: 5rem;"><?php echo $m["tenmathang"]; ?></div>
                                                        </a>
                                                        <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                                            <img id="sp" class="card-img-top" src="<?php echo $m["hinhanh1"] ?>" style="width: 10rem; height: 10rem;" alt="<?php echo $m["mota"] ?>">
                                                        </a>
                                                        <div class="card-body">
                                                            <h5 class="card-title" style="width: 16rem;height: 2rem; color:crimson;"><?php echo number_format($m["giaban"]); ?>đ</h5>

                                                            <div><a href="?action=detail&id=<?php echo $m["id"]; ?>" class="btn btn-primary">Xem thêm</a>
                                                                <a href="?action=chovaogio&id=<?php echo $m["id"]; ?>&soluong=1" class="btn btn-warning">Cho vào giỏ</a></div>
                                                        </div>
                                                    </div>
                                                    </br>
                                                </div>
                                    <?php

                                            }
                                        }
                                    endforeach; ?>

                                </div>
                                <a style="color:black; float:right;" href="?action=group&m=<?php echo $d["id"] ?>">Xem thêm ></a>
                                <br />
                                <hr width="70%" class="center" color="red" />
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <!-- Trinh bay san theo hang-->
                    <h4>
                        <p class=" mt-5" style="color:red;">Sản phẩm theo hãng</p>
                    </h4>
                    <hr width="100%" class="center" color="blue" />
                    <?php

                    foreach ($hang as $d) :
                        $sosanpham = 0; ?>
                        <div id="item-<?php echo $ii;
                                        $ii++; ?>">
                            </br>
                            <h4>
                                <p><a style="color:black;" href="?action=group&h=<?php echo $d["id"] ?>"><?php echo $d["tenhang"] ?></a></p>
                            </h4>

                            <div class="row">
                                <?php

                                foreach ($mathang as $m) :
                                    if ($sosanpham < 4) {
                                        if ($m["hang_id"] == $d["id"]) {
                                            $sosanpham++;



                                ?>
                                            <div class="col-sm-3">

                                                <div class="card" style="width: 16rem;height: 24rem; ">
                                                    <div class="card-header" style="width: 16rem; height: 5rem;"><a href="?action=detail&id=<?php echo $m["id"]; ?>"><?php echo $m["tenmathang"]; ?></a></div>
                                                    <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                                                        <img class="card-img-top" id="anh" src="<?php echo $m["hinhanh1"] ?>" style="width: 10rem; height: 10rem;" alt="<?php echo $m["mota"] ?>"></a>
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="width: 16rem;height: 2rem; color:crimson;"><?php echo number_format($m["giaban"]); ?>đ</h5>
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
                                endforeach; ?>

                            </div>
                            <a style="color:black; float:right;" href="?action=group&h=<?php echo $d["id"] ?>">Xem thêm ></a>
                            <br />
                            <div>
                                <hr width="70%" class="center" color="red" />
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                </br>
            </div>
            <div class="col-sm-1"><a href="?action=detail&id=7"><img src="images/qc4.png" class="img-fluid mt-5 sticky-top" alt="Tên hàng"></a>
                               
        </div>
            <div class="col-sm-1"> <a href="#" class="sticky-top" style="padding-top:900px; color:red;"><i class="far fa-hand-point-up"></i>Về đầu trang</a></div>
        </div>

    </div>
                                
    <?php require("include/Footer.php") ?>
</body>


</html>