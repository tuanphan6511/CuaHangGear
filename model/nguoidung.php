<?php
class NGUOIDUNG{
    private $id;
    private $email;
    private $sodienthoai;
    private $matkhau;
    private $hoten;
    private $loai;
    private $trangthai;
    private $hinhanh;
    public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }

    public function getEMAIL(){
        return $this->email;
    }

    public function setEMAIL($value){
        $this->email = $value;
    }

    public function getSODIENTHOAI(){
        return $this->sodienthoai;
    }

    public function setSODIENTHOAI($value){
        $this->sodienthoai = $value;
    }
    public function getMATKHAU(){
        return $this->matkhau;
    }

    public function setMATKHAU($value){
        $this->matkhau = $value;
    }

    public function getHOTEN(){
        return $this->hoten;
    }

    public function setHOTEN($value){
        $this->hoten = $value;
    }

    public function getLOAI(){
        return $this->loai;
    }

    public function setLOAI($value){
        $this->loai = $value;
    }

    public function getTRANGTHAI(){
        return $this->trangthai;
    }

    public function setTRANGTHAI($value){
        $this->trangthai = $value;
    }

    public function getHINHANH(){
        return $this->hinhanh;
    }

    public function setHINHANH($value){
        $this->hinhanh = $value;
    }


    public function laydanhsachnguoidung(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM  nguoidung";
            $cmd = $dbcon->prepare($sql);
           
            $cmd->execute(); 
            $result = $cmd->fetchAll();
            $cmd->closeCursor();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // kt nguoi dung
    public function kiemtranguoidunghople($email,$matkhau){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung where email=:email AND matkhau=:matkhau AND trangthai=1";
            $cmd = $dbcon->prepare($sql);
            
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", md5($matkhau));

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
    public function thangcap($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET loai=loai-1 where id=:id";
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
    public function hacap($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET loai=loai+1 where id=:id";
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
    public function kiemtranguoidung($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nguoidung where email=:email";
            $cmd = $dbcon->prepare($sql);
            
            $cmd->bindValue(":email", $email);
            

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
    public function laynguoidungtheoemail($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM  nguoidung where email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
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
    public function layttnguoidungtheoemail($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM  nguoidung where email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
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
    // lay thong tin cua 1 nguoi dung
    public function laythongtinnguoidung($email){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM  nguoidung where email=:email";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute(); 
            $result = $cmd->fetch();
            $cmd->closeCursor();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // update thong tin ng dung
    public function capnhatnguoidung($id,$email,$sodienthoai,$hoten,$hinhanh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET email=:email, sodienthoai=:sodienthoai,hoten=:hoten,hinhanh=:hinhanh where id=:id";
            $cmd = $dbcon->prepare($sql);           
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":sodienthoai", $sodienthoai);
            $cmd->bindValue(":hoten", $hoten);
            $cmd->bindValue(":hinhanh", $hinhanh);
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

    //cap nhat mat khau
    public function capnhatmatkhau($email,$matkhau){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET matkhau=:matkhau where  email=:email";
            $cmd = $dbcon->prepare($sql);           
            $cmd->bindValue(":email", $email);
            
            $cmd->bindValue(":matkhau", md5($matkhau));
            
            $result = $cmd->execute();
           
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhatkhoa($trangthai,$id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE nguoidung SET trangthai=:trangthai where  id=:id";
            $cmd = $dbcon->prepare($sql); 
            $cmd->bindValue(":id", $id);         
            $cmd->bindValue(":trangthai", $trangthai); 
            $result = $cmd->execute();
           
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function forgot($id,$sdt){
        $dbcon = DATABASE::connect();
        try{
            $mk=md5("$sdt");
            $sql = "UPDATE nguoidung SET matkhau=:matkhau where  id=:id";
            $cmd = $dbcon->prepare($sql); 
            $cmd->bindValue(":matkhau", $mk);
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
    public function dangkytaikhoan($hoten,$email,$matkhau,$sodienthoai,$loai,$hinhanh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO nguoidung(email,sodienthoai,matkhau,hoten,loai,trangthai,hinhanh) 
            VALUES(:email,:sodienthoai,:matkhau,:hoten,:loai,:trangthai,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":sodienthoai", $sodienthoai);
            $cmd->bindValue(":matkhau", md5($matkhau));
            $cmd->bindValue(":loai", $loai);
            $cmd->bindValue(":trangthai", 1);
            $cmd->bindValue(":hoten", $hoten);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function dangkytaikhoanmuahang($hoten,$email,$sodienthoai){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,loai,trangthai) VALUES(:email,:matkhau,:sodt,:hoten,3,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($sodienthoai));
			$cmd->bindValue(':sodt',$sodienthoai);
			$cmd->bindValue(':hoten',$hoten);
			
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

}
?>
