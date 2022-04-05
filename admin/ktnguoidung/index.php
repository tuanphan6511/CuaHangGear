<?php   
require_once("../../model/database.php");
require_once("../../model/nguoidung.php");
require_once("../../model/mathang.php");
require_once("../../model/hang.php");
$isLogin = isset($_SESSION["nguoidung"]);
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}elseif($isLogin==false){
    $action="dangnhap";
}
else{
    $action="xem";
}
$nd = new NGUOIDUNG();

switch($action){
    case "dangky":      
        include("dangky.php");
        break;
    case "dangnhap":      
        include("loginform.php");
        break;
    case "xldangnhap":
        if($nd->kiemtranguoidunghople($_POST["txtemail"],$_POST["txtmatkhau"])){
            
            $_SESSION["nguoidung"]=$nd->laythongtinnguoidung($_POST["txtemail"]);
            if($_SESSION["nguoidung"]["loai"]==1 || $_SESSION["nguoidung"]["loai"]==2)
            {
                //header("location=../qldanhmuc/index.php");
                require_once("main.php"); 
            }            
            else
            {
                
                header("location:../../");
            }    
        }else{
            $thongbao="Sai thông tin đăng nhập!";
            include("loginform.php");

        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        include("loginform.php");
        break;
    case "xem":
        if($_SESSION["nguoidung"]["loai"] == 3)
        {
            header("location:../../");
        }else
        include("main.php");
        break;
    case "capnhat":
        
        $thongbao="";
        $id=$_POST["txtid"];
        $email=$_POST["txtemail"];
        $sodienthoai=$_POST["txtdienthoai"];
        $hoten=$_POST["txthoten"];
        $hinhanh= $_POST["txthinhanh"];
        //upload file
        $tenfile=random_int(0,2147483647).".png";
        if($_FILES["fhinh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/icon/". $tenfile;// đường dẫn lưu csdl
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }
        $nd->capnhatnguoidung($id,$email,$sodienthoai,$hoten,$hinhanh);
        //gan lai thong tin moi
        
        $_SESSION["nguoidung"]=$nd->laythongtinnguoidung($_POST["txtemail"]);
        $thongbao="Cập nhật thông tin thành công!";
        include("main.php");
        break;

    case "doimatkhau":
        $thongbao="";
        $mkc=$_POST["txtmatkhaucu"];
        $mkcn=md5($_POST["txtmatkhaucunhap"]);
        $mk1=$_POST["txtmatkhaumoi"];
        $mk2=$_POST["txtmatkhaumoi2"];
        $email=$_POST["txtemail"];
        
        if($mkc!=$mkcn)
        {
            $thongbao="Đổi mật khẩu thất bại";
            $flag=0;
        }else if($mk1!=$mk2)
        {
            $thongbao="Mật khẩu xác thực không chính xác!";
            $flag=0;
        }else
            {
                $nd->capnhatmatkhau($email,$mk1);
                $thongbao="Cập nhật mật khẩu thành công!";
                
            }
        //header("location:index.php");
        $_SESSION["nguoidung"]=$nd->laythongtinnguoidung($_POST["txtemail"]);
        include("main.php");
        break;
        
    case "themtaikhoan":
        $thongbao="";
        $mk1=$_POST["txtmatkhau"];
        $mk2=$_POST["txtmatkhau2"];
        $hoten=$_POST["txthoten"];
        $email=$_POST["txtemail"];
        $sdt=$_POST["txtsodienthoai"];
        if(isset($_POST["optquyen"]))
        {
            $loai=$_POST["optquyen"];
        }else
            $loai=3;
        
        $flag=1;
        if( $nd->kiemtranguoidung($email))
        {
            $thongbao="Email tồn tại!";
            
            $flag=0;
        }
        if($mk1!=$mk2)
        {
            $thongbao="Mật khẩu không đúng!";
            
            $flag=0;
        }
        
        //them mat hang
        if($flag==1){
            if($_FILES["filehinhanh1"]["name"]!=null)
            {
                $tenfile=random_int(0,2147483647).".png";
                //$hinhanh="images/".basename($_FILES["filehinhanh1"]["name"]);
                $hinhanh="images/icon/".$tenfile;
                $duongdan="../../".$hinhanh;// noi uploadfile
             move_uploaded_file($_FILES["filehinhanh1"]["tmp_name"],$duongdan);

            }else{
                $hinhanh="images/icon/user.jpg";
            }
            
            
        
        $nd->dangkytaikhoan($hoten,$email,$mk1,$sdt,$loai,$hinhanh);
        $thongbao="đăng ký thành công";     
        
        }
        
        if(isset($_SESSION["nguoidung"])&&$thongbao=="đăng ký thành công"&&$_SESSION["nguoidung"]["loai"]!=1)
        {
            //header("loginform.php");
            include("loginform.php");
        }else{
            include("dangky.php");
        }
       
        break;
    case "xemdanhsach":
        header("location:../qlnguoidung/index.php");
        break;  
        
    case "index":        
        header("location:../ktnguoidung/main.php");
        break;
    case "forgot":
        $email=$_POST["txtemail"];
        $sdt=$_POST["txtsodienthoai"];
        $mk1=$_POST["txtmatkhaumoi"];
        $mk2=$_POST["txtmatkhaumoi2"];
        $tt=$nd->laythongtinnguoidung($email);
        $id=$tt["id"];
        if($tt!=true)
        {
            $thongbao="Email không tồn tại";
            
        }else
            if($mk1!=$mk2)
            {
                $thongbao="Mật khẩu xác nhận không chính xác!";
            }else
            {
                $nd->forgot($id,$_POST["txtmatkhaumoi"]);
                $thongbao="Mật khẩu tài khoản đã được đặt lại.";
            }
        
        //$nguoidung=$nd->laydanhsachnguoidung();  
        include("loginform.php");
        
        break;
    case "themsanpham":
        header("location:../qlmathang/index.php?action=them");
        break;   
    default:
        break;
}
?>
