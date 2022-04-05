<?php
class DIACHI{
	public function themdiachi($nguoidungid,$diachi,$macdinh){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO diachi(nguoidung_id,diachi,macdinh) VALUES(:nguoidung_id,:diachi,:macdinh)";
			$cmd = $db->prepare($sql);
			
			$cmd->bindValue(':nguoidung_id',$nguoidungid);
			$cmd->bindValue(':diachi',$diachi);
			$cmd->bindValue(':macdinh',$macdinh);
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
	public function laydouutien($nguoidungid){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM diachi WHERE nguoidung_id=:id";
			$cmd = $db->prepare($sql);
			
			$cmd->bindValue(':id',$nguoidungid);
			
			$cmd->execute();
			$result = ($cmd->rowCount()==1);
            $cmd->closeCursor();
            return $result;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function laydiachitheoid($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM diachi WHERE id=:id";
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
    public function laydiachitheoidnd($id)
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT diachi FROM diachi WHERE nguoidung_id=:id LIMIT 1";
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
	public function kiemtradiachi($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM diachi where nguoidung_id=:id";
            $cmd = $dbcon->prepare($sql);
            
            $cmd->bindValue(":id", $id);
            

            $cmd->execute();
            $result = ($cmd->rowCount()==1);
            $cmd->closeCursor();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laydsdiachi()
    {
        $dbcon = DATABASE::connect();
        try
        {
            $sql = "SELECT * FROM diachi";
            $cmd = $dbcon->prepare($sql);
            
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


	
}
?>
