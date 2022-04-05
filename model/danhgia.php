<?php
class DANHGIA{
    private $id;
    private $sosao;
    private $noidung;
    private $mathang_id;
    private $nguoidung_id;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }
    
    public function getSosao(){
        return $this->sosao;
    }

    public function setSosao($value){
        $this->sosao = $value;
    }

    public function getNoidung(){
        return $this->noidung;
    }

    public function setNoidung($value){
        $this->noidung = $value;
    }

    public function getMathang_id(){
        return $this->mathang_id;
    }

    public function setMathang_id($value){
        $this->mathang_id = $value;
    }
    public function getNguoidung_id(){
        return $this->nguoidung_id;
    }

    public function setNguoidung_id($value){
        $this->nguoidung_id = $value;
    }
    
    public function laybinhluantheomathang($mathang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM danhgia where mathang_id=:mathang_id GROUP by id  desc LIMIT 5";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":mathang_id", $mathang_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy danh sách
  

    // Thêm mới
    public function themdanhgia($sosao,$noidung,$mathang_id,$nguoidung_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO danhgia(sosao,noidung,mathang_id,nguoidung_id) VALUES(:sosao,:noidung,:mathang_id,:nguoidung_id)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":sosao", $sosao);
            $cmd->bindValue(":noidung", $noidung);
            $cmd->bindValue(":mathang_id", $mathang_id);
            $cmd->bindValue(":nguoidung_id", $nguoidung_id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoadanhmuc($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM danhmuc WHERE id=:id";
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

    // Cập nhật 
    public function suadanhmuc($id, $tendm){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE danhmuc SET tendanhmuc=:tendanhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tendanhmuc", $tendm);
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

    // Lấy danh mục theo id
    public function laydanhmuctheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM danhmuc WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

}
?>