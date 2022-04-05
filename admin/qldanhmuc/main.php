<?php include("../view/top.php"); ?>

<h3>Quản lý danh mục</h3>
<br>
<div id="buttonthem"><a class="btn btn-warning"><i class="fas fa-plus"></i>Thêm mới</a></div>
<br>
<div id="formthem">
    <form class="form-inline" method="POST">
        <input type="text" class="form-control" name="txtten" placeholder="Nhập tên danh mục" required>
        <input type="hidden" name="action" value="xulythem">
        <input type="submit" class="btn btn-warning" value="Thêm">
    </form>
</div>
<table class="table table-hover">
    <tr class="bg-primary">
        <th>Tên danh mục</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    foreach ($danhmuc as $d) :
        if ($d["id"] == $idsua) {
    ?>
            <form method="post">
                <tr>
                    <td width="80%"><input class="alert alert-primary" role="alert" name="txtten" type="text" class="form-control" value="<?php echo $d["tendanhmuc"] ?>" required></td>
                    <td>
                        <input type="hidden" name="txtid" value="<?php echo $d["id"]; ?>">
                        <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Cập nhật</a>

                        <input type="hidden" name="action" value="xulysua">

                        <!-- hỏi -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn thay đổi?
                                    </div>
                                    <div class="modal-footer">
                                        <input class="btn btn-warning" type="submit" value="Cập nhật">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </td>
                    <td> <a href="" data-toggle="modal" data-target="#exampleModal2"><i class="far fa-trash-alt"></i></a>

                    </td>
                </tr>
            </form>
        <?php
        } else {
        ?>
            <tr>
                
                <td width="80%"><?php echo $d["tendanhmuc"] ?></td>
                <td><a href="index.php?action=sua&id=<?php echo $d["id"]; ?>"><i class="far fa-edit"></i></a></td>
                <td><?php $kiemtra=$mh->kiemtradanhmuctrongmathang($d["id"]); if($kiemtra==0){?><a data-toggle="modal" data-target="#exampleModal<?php echo $d["id"]; ?>" href=""><i class="far fa-trash-alt"></i></a><?php } ?></td>
                <div class="modal fade" id="exampleModal<?php echo $d["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc muốn xóa?
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $d["id"]; ?>">Xóa</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
    <?php
        }
    endforeach;
    ?>
    <!-- hỏi -->

    <!---------kết hỏi -->
</table>

<script>
    $(document).ready(function() {
        //Mặc đinh ẩn form
        $("#formthem").hide();

        //Hien thị form khi ấn thêm mới
        $("#buttonthem").click(function() {
            $("#formthem").toggle(1000); //toggle nếu ẩn là sẽ hiện và ngược lại
            $("#buttonthem").hide();
        });
    });
</script>
<?php include("../view/bottom.php"); ?>