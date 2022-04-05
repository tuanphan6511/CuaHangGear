<?php
class HANG{
    private $id;
    private $tenhang;

    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function getTenhang(){
        return $this->tenhang;
    }

    public function setTenhang($value){
        $this->tenhang = $value;
    }

    // Lấy danh sách
    public function layhang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM hang";
            $cmd = $dbcon->prepare($sql);
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

    // Thêm mới
    public function themhang($tenhang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO hang(tenhang) VALUES(:tenhang)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenhang", $tenhang);
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
    public function xoahang($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM hang WHERE id=:id";
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
    public function suahang($id, $tenhang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE hang SET tenhang=:tenhang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenhang", $tenhang);
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
    public function layhangtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM hang WHERE id=:id";
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