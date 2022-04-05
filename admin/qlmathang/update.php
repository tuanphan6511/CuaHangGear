<?php include("../view/top.php"); ?>

<h3>Sửa mặt hàng</h3>
<br>
<?php 
    
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" class="form-control" name="txtid" value="<?php echo $mathanghientai["id"] ?>" required>
    </div>
    <div class="form-group">

        <label>Tên mặt hàng</label>
        <input type="text" class="form-control" name="txttenmathang" value="<?php echo $mathanghientai["tenmathang"] ?>" required>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea  style="height:200px;" class="form-control" name="txtmota" ><?php echo $mathanghientai["mota"] ?></textarea>
    </div>
    <div class="form-group">
        <label>Giá bán</label>
        <input type="number" class="form-control" name="txtgiaban" value="<?php echo $mathanghientai["giaban"] ?>" required min="0">
    </div>
    <div class="form-group">
        <label>Số lượng tồn</label>
        <input type="number" class="form-control" name="txtsoluongton" value="<?php echo $mathanghientai["soluongton"] ?>" required min="0">
    </div>
    <div class="form-group">
        <label>Xuất sứ</label>
        <input type="text" class="form-control" name="txtnsx" value="<?php echo $mathanghientai["nsx"] ?>" required>
    </div>
    <div class="form-group">
        <label>Tình trạng</label>
        <input type="text" class="form-control" name="txttinhtrang" value="<?php echo $mathanghientai["tinhtrang"] ?>" required>
    </div>
    <div class="form-group">
        <label>Bảo hành</label>
        <input type="text" class="form-control" name="txtbaohanh" value="<?php echo $mathanghientai["baohanh"] ?>" required>
    </div>
    <div class="form-group">
        <label>Hình ảnh chính</label>
        <br>
        <img width="80px" src="../../<?php echo $mathanghientai["hinhanh1"];?>">
        
        <input type="file" class="form-control" name="filehinhanh1">
    </div>
    <div class="form-group">
        <label>Hình ảnh 2</label>
        <br>
        <img width="80px" src="../../<?php echo $mathanghientai["hinhanh2"];?>">
        
        <input type="file" class="form-control" name="filehinhanh2">
    </div>
    <div class="form-group">
        <label>Hình ảnh 3</label>
        <br>
        <img width="80px" src="../../<?php echo $mathanghientai["hinhanh3"];?>">
        
        <input type="file" class="form-control" name="filehinhanh3">
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select type="text" class="form-control" name="optdanhmuc" >
            <?php 
            foreach($danhmuc as $d):
                if($mathanghientai["danhmuc_id"]==$d["id"])
                    echo '<option  value="'.$d['id'].'" selected="selected">'.$d['tendanhmuc'].' </option>"';
                else
                    echo '<option  value="'.$d['id'].'">'.$d['tendanhmuc'].' </option>"';
            ?>
                
            <?php
            endforeach;
             ?>
        </select>
    </div>
    <div class="form-group">
        <label>Hãng</label>
        <select type="text" class="form-control" name="opthang" >
            <?php 
            foreach($hang as $d):
                if($mathanghientai["hang_id"]==$d["id"])
                    echo '<option  value="'.$d['id'].'" selected="selected">'.$d['tenhang'].' </option>"';
                else
                    echo '<option  value="'.$d['id'].'">'.$d['tenhang'].' </option>"';
            ?>
                
            <?php
            endforeach;
             ?>
        </select>
    </div>
    <div class="form-group">
        <label>lượt xem</label>
        <input type="number" class="form-control" name="txtluotxem" value="<?php echo $mathanghientai["luotxem"] ?>" min="0">
    </div>
    <div class="form-group">
        <label>Lượt mua</label>
        <input type="number" class="form-control" name="txtluotmua" value="<?php echo $mathanghientai["luotmua"] ?>" min="0">
    </div>
    <input type="hidden" name="action" value="xulysua">
    <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Cập nhật</a>
    <!-- <input type="submit" class="btn btn-primary" value="Lưu">-->

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
</form>

<?php include("../view/bottom.php"); ?>