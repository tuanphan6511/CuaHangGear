<?php include("../view/top.php"); ?>

<h3>Thêm mặt hàng</h3>
<br>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên mặt hàng</label>
        <input type="text" class="form-control" name="txttenmathang" required>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea style="height:200px;" class="form-control" name="txtmota"></textarea>
    </div>
    <div class="form-group">
        <label>Giá bán</label>
        <input type="number" class="form-control" name="txtgiaban" value="0" min="0">
    </div>
    <div class="form-group">
        <label>Số lượng tồn</label>
        <input type="number" class="form-control" name="txtsoluongton" value="0" min="0">
    </div>
    <div class="form-group">
        <label>Xuất sứ</label>
        <input type="text" class="form-control" name="txtnsx" required>
    </div>
    <div class="form-group">
        <label>Tình trạng</label>
        <input type="text" class="form-control" name="txttinhtrang" required value="Mới">
    </div>
    <div class="form-group">
        <label>Bảo hành</label>
        <input type="number" class="form-control" name="txtbaohanh" required value="12">
    </div>
    <div class="form-group">
        <label>Hình ảnh chính</label>
        <input type="file" class="form-control" name="filehinhanh1" required>
    </div>
    <div class="form-group">
        <label>Hình ảnh 2</label>
        <input type="file" class="form-control" name="filehinhanh2" required>
    </div>
    <div class="form-group">
        <label>Hình ảnh 3</label>
        <input type="file" class="form-control" name="filehinhanh3" required>
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select type="text" class="form-control" name="optdanhmuc">
            <?php 
            foreach($danhmuc as $d):
                
            ?>
                <option value="<?php echo $d["id"] ?>"><?php echo $d["tendanhmuc"] ?></option>
            <?php
            endforeach;
             ?>
        </select>
    </div>
    <div class="form-group">
        <label>Hãng</label>
        <select type="text" class="form-control" name="opthang">
            <?php 
            foreach($hang as $d):
                
            ?>
                <option value="<?php echo $d["id"] ?>"><?php echo $d["tenhang"] ?></option>
            <?php
            endforeach;
             ?>
        </select>
    </div>
    <input type="hidden" name="action" value="xulythem">
    <input type="submit" class="btn btn-primary" value="Lưu">
</form>

<?php include("../view/bottom.php"); ?>