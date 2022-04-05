<?php
class MATHANG{
    //thuộc tính get/set
    private $id;
    private $tenmathang;
    private $mota;
    private $gia;
    private $soluongton;
    private $nsx;
    private $tinhtrang;
    private $baohanh;
    private $hinhanh1;
    private $hinhanh2;
    private $hinhanh3;
    private $danhmuc_id;
    private $hang_id;
    private $luotxem;
    private $luotmua;
    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function getTENMATHANG(){
        return $this->tenmathang;
    }

    public function setTENMATHANG($value){
        $this->tenmathang = $value;
    }

    public function getMOTA(){
        return $this->mota;
    }

    public function setMOTA($value){
        $this->mota = $value;
    }
    public function getGIA(){
        return $this->gia;
    }

    public function setGIA($value){
        $this->gia = $value;
    }

    public function getSOLUONGTON(){
        return $this->soluongton;
    }

    public function setSOLUONGTON($value){
        $this->soluongton = $value;
    }

    public function getNSX(){
        return $this->nsx;
    }

    public function setNSX($value){
        $this->nsx = $value;
    }

    public function getTINHTRANG(){
        return $this->tinhtrang;
    }

    public function setTINHTRANG($value){
        $this->tinhtrang = $value;
    }

    public function getBAOHANH(){
        return $this->baohanh;
    }

    public function setBAOHANH($value){
        $this->baohanh = $value;
    }

    public function getHINHANH1(){
        return $this->hinhanh1;
    }

    public function setHINHANH1($value){
        $this->hinhanh1 = $value;
    }

    public function getHINHANH2(){
        return $this->hinhanh2;
    }

    public function setHINHANH2($value){
        $this->hinhanh2 = $value;
    }

    public function getHINHANH3(){
        return $this->hinhanh3;
    }

    public function setHINHANH3($value){
        $this->hinhanh3 = $value;
    }
    

    public function getDANHMUC_ID(){
        return $this->danhmuc_id;
    }

    public function setDANHMUC_ID($value){
        $this->danhmuc_id = $value;
    }

    public function getHANG_ID(){
        return $this->hang_id;
    }

    public function setHANG_ID($value){
        $this->hang_id = $value;
    }

    public function getLUOTXEM(){
        return $this->luotxem;
    }

    public function setLUOTXEM($value){
        $this->luotxem = $value;
    }

    public function getLUOTMUA(){
        return $this->luotmua;
    }

    public function setLUOTMUA($value){
        $this->luotmua = $value;
    }
    // Lấy danh sách mặt hàng
    public function laymathang()
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function demtongsomathangtheodanhmuc($danhmuc_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM mathang WHERE danhmuc_id=:dmid";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dmid", $danhmuc_id);
            $cmd->execute();
            $ketqua = $cmd->fetchColumn();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function demtongsomathangtheohang($hang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM mathang WHERE hang_id=:hangid";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hangid", $hang_id);
            $cmd->execute();
            $ketqua = $cmd->fetchColumn();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //Lấy danh sách mặt hàng khoảng chỉ định
    

    public function laymathangtheodanhmucsx($danhmuc_id,$batdau,$soluong)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:dmid ORDER BY id DESC LIMIT $batdau, $soluong"  ;
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dmid", $danhmuc_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //lấy danh sách mặt hàng theo danh mục
    
    public function laymathangtheodanhmuc($danhmuc_id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:dmid";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dmid", $danhmuc_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laymathangtheohangsx($hang_id,$batdau,$soluong)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE hang_id=:dmid ORDER BY id DESC LIMIT $batdau, $soluong";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dmid", $hang_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //lấy danh sách mặt hàng theo hang
    public function laymathangtheohang($hang_id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE hang_id=:dmid";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dmid", $hang_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //lấy một mặt hàng theo id
    public function laymathangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();//lấy tất cả các dòng dữ liệu
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //Lấy mặt hàng có hãng và danh mục
    public function laymathangtheohdm()
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT mh.*,tenhang,tendanhmuc  FROM mathang as mh,hang as h,danhmuc as dm
            where mh.hang_id=h.id and mh.danhmuc_id=dm.id";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //Cập nhật lượt xem mặt hàng lên 1
    public function tangluotxem($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "UPDATE mathang SET luotxem = luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);//chuẩn bị câu truy vấn
            $cmd->bindValue(":id", $id);//lấy giá trị tại tham số :id
            //$cmd->execute();//thực thi
            $result = $cmd->execute();//lấy kết quả là thêm được hay không - true-false
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function viewcao()
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = " SELECT * from mathang ORDER BY luotxem DESC LIMIT 5";
            $cmd = $dbcon->prepare($sql);//chuẩn bị câu truy vấn
            //$cmd->bindValue(":id", $id);//lấy giá trị tại tham số :id
            //$cmd->execute();//thực thi
            $cmd->execute();
            $result = $cmd->fetchAll();//lấy kết quả là thêm được hay không - true-false
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    //Thêm mặt hàng
    public function themmathang($tenmathang,$mota ,$giaban,$soluongton,$nsx,$tinhtrang,$baohanh,$hinhanh1,$hinhanh2,$hinhanh3,$danhmuc_id,$hang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO mathang(tenmathang,mota,giaban,soluongton,nsx,tinhtrang,baohanh,hinhanh1,hinhanh2,hinhanh3,danhmuc_id,hang_id,luotxem,luotmua) 
            VALUES(:tenmathang,:mota,:giaban,:soluongton,:nsx,:tinhtrang,:baohanh,:hinhanh1,:hinhanh2,:hinhanh3,:danhmuc_id,:hang_id,0,0)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", $tenmathang);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":giaban", $giaban);
            $cmd->bindValue(":soluongton", $soluongton);
            $cmd->bindValue(":nsx", $nsx);
            $cmd->bindValue(":tinhtrang", $tinhtrang);
            $cmd->bindValue(":baohanh", $baohanh);
            $cmd->bindValue(":hinhanh1", $hinhanh1);
            $cmd->bindValue(":hinhanh2", $hinhanh2);
            $cmd->bindValue(":hinhanh3", $hinhanh3);
            $cmd->bindValue(":danhmuc_id", $danhmuc_id);
            $cmd->bindValue(":hang_id", $hang_id);
            
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //Sửa mặt hàng
    public function suamathang($tenmathang,$mota ,$giaban,$soluongton,$nsx,$tinhtrang,$baohanh,$hinhanh1,$hinhanh2,$hinhanh3,$danhmuc_id,$hang_id,$luotxem,$luotmua,$id)
    {
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang 
            SET tenmathang=:tenmathang, mota=:mota, giaban=:giaban, soluongton=:soluongton,nsx=:nsx,tinhtrang=:tinhtrang,baohanh=:baohanh, hinhanh1=:hinhanh1,hinhanh2=:hinhanh2,hinhanh3=:hinhanh3,danhmuc_id=:danhmuc_id,hang_id=:hang_id, luotxem=:luotxem,luotmua=:luotmua
            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", $tenmathang);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":giaban", $giaban);
            $cmd->bindValue(":soluongton", $soluongton);
            $cmd->bindValue(":nsx", $nsx);
            $cmd->bindValue(":tinhtrang", $tinhtrang);
            $cmd->bindValue(":baohanh", $baohanh);
            $cmd->bindValue(":hinhanh1", $hinhanh1);
            $cmd->bindValue(":hinhanh2", $hinhanh2);
            $cmd->bindValue(":hinhanh3", $hinhanh3);
            $cmd->bindValue(":danhmuc_id", $danhmuc_id);
            $cmd->bindValue(":hang_id", $hang_id);
            $cmd->bindValue(":luotxem", $luotxem);
            $cmd->bindValue(":luotmua", $luotmua);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //xóa mặt hàng
    public function xoamathang($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
    public function timkiemmathang($tenmathang)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE tenmathang LIKE :tenmathang";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", "%".$tenmathang."%");
            $cmd->execute();
            $result = $cmd->fetchAll();//lấy tất cả các dòng dữ liệu
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhatsoluong($id,$soluongban)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "UPDATE mathang SET soluongton = soluongton-:soluongban WHERE id=:id";
            $cmd = $dbcon->prepare($sql);//chuẩn bị câu truy vấn
            $cmd->bindValue(":soluongban", $soluongban);
            $cmd->bindValue(":id", $id);//lấy giá trị tại tham số :id
            //$cmd->execute();//thực thi
            $result = $cmd->execute();//lấy kết quả là thêm được hay không - true-false
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhatsoluong2($id,$soluongban)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "UPDATE mathang SET soluongton = soluongton+:soluongban WHERE id=:id";
            $cmd = $dbcon->prepare($sql);//chuẩn bị câu truy vấn
            $cmd->bindValue(":soluongban", $soluongban);
            $cmd->bindValue(":id", $id);//lấy giá trị tại tham số :id
            //$cmd->execute();//thực thi
            $result = $cmd->execute();//lấy kết quả là thêm được hay không - true-false
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtraton($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT soluongton FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();//lấy tất cả các dòng dữ liệu
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtradanhmuctrongmathang($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:id";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->rowCount();//lấy tất cả các dòng dữ liệu
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtrahangtrongmathang($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM mathang WHERE hang_id=:id";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->rowCount();//lấy tất cả các dòng dữ liệu
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtramathangtrongdanhgia($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM danhgia WHERE mathang_id=:id";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->rowCount();//lấy tất cả các dòng dữ liệu
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function kiemtramathangtrongdonhangct($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM donhangct WHERE mathang_id=:id";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->rowCount();//lấy tất cả các dòng dữ liệu
            return $result;
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
?>