<?php
class DONHANGCT{
	public function themchitietdonhang($donhang_id,$mathang_id,$dongia,$soluong,$thanhtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhangct(donhang_id,mathang_id,dongia,soluong,thanhtien) VALUES(:donhang_id,:mathang_id,:dongia,:soluong,:thanhtien)";
			$cmd = $db->prepare($sql);
			
			$cmd->bindValue(':donhang_id',$donhang_id);
			$cmd->bindValue(':mathang_id',$mathang_id);
			$cmd->bindValue(':dongia',$dongia);
			$cmd->bindValue(':soluong',$soluong);
			$cmd->bindValue(':thanhtien',$thanhtien);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function laygiadonhangctsanpham($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT mathang_id,thanhtien,donhang_id,soluong FROM donhangct WHERE id=:id";
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
	public function xoadonhangsanpham($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM donhangct WHERE id=:id";
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
	public function laydonhangcantiepnhan(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung nd,donhang dh where nd.id=dh.nguoidung_id ORDER BY dh.id DESC";
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
    public function laydonhangctmh($iddonhang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhangct ct,mathang mh where ct.mathang_id=mh.id and ct.donhang_id=:iddonhang";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":iddonhang", $iddonhang);
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
    public function laytrangthaict($iddonhang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT donhang_id,trangthai FROM donhangct ct where donhang_id=:iddonhang";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":iddonhang", $iddonhang);
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
    public function tiepnhan($donhang_id,$trangthai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE donhangct SET trangthai=:trangthai WHERE donhang_id=:donhang_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trangthai", $trangthai);
            $cmd->bindValue(":donhang_id", $donhang_id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function tiepnhantatca(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE donhangct SET trangthai=1";
            $cmd = $dbcon->prepare($sql);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhatghichu($id,$noidung){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE donhangct SET ghichu=:ghichu where donhang_id=:id";
            
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ghichu", $noidung);
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



	
}
?>
