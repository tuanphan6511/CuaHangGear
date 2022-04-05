<?php
class DONHANG{
	public function themdonhang($nguoidungid,$diachi,$tongtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhang(nguoidung_id,diachi_id,tongtien) VALUES(:nguoidung_id,:diachi,:tongtien)";
			$cmd = $db->prepare($sql);
			
			$cmd->bindValue(':nguoidung_id',$nguoidungid);
			$cmd->bindValue(':diachi',$diachi);
			$cmd->bindValue(':tongtien',$tongtien);
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
	public function laythongtindonhangtheoidnguoidung($nguoidungid){
        $dbcon = DATABASE::connect();
        try{
            $sql = " SELECT DISTINCT dh.*,mh.tenmathang,mh.hinhanh1,ct.dongia,ct.thanhtien,ct.soluong,ct.id,ct.trangthai,ct.ghichu FROM mathang mh,donhangct ct, donhang dh
			where mh.id=ct.mathang_id and ct.donhang_id=dh.id and dh.nguoidung_id=:nguoidungid";
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(':nguoidungid',$nguoidungid);
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
    public function xoadonhangtongtien(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM donhang WHERE tongtien=0";
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
	public function capnhatsotiendonhang($id,$sotien){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE donhang SET tongtien=tongtien-:sotien WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(':sotien',$sotien);
			$cmd->bindValue(':id',$id);
            $result =$cmd->execute();
            
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
