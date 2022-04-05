<?php   
require_once("model/database.php");
require_once("model/nguoidung.php");
require_once("model/mathang.php");
require_once("model/hang.php");
require_once("model/danhmuc.php");
require_once("model/giohang.php");
require_once("model/danhgia.php");
require_once("model/diachi.php");
require_once("model/donhang.php");
require_once("model/donhangct.php");

$isLogin = isset($_SESSION["nguoidung"]);
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}
$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$h = new HANG();
$hang = $h->layhang();
$mh = new MATHANG();
$mathang = $mh->laymathang();
$dg= new DANHGIA();
$nd= new NGUOIDUNG();
$danhsachngdung= $nd->laydanhsachnguoidung();


switch($action){
    case "xem":
        
        include("trangchu.php");
        break;
    case "detail":
        if (isset($_GET["id"])) {
            $mathang_id = $_GET["id"];
        } else
            $mathang_id = 1;
        
        $mathanghientai = $mh->laymathangtheoid($mathang_id);
        $mathangtheodanhmuc = $mh->laymathangtheodanhmuc($mathanghientai["danhmuc_id"]);
        $mh->tangluotxem($mathanghientai["id"]);
        $danhgiatheomathang = $dg->laybinhluantheomathang($mathanghientai["id"]);
        if (isset($_POST["txtnoidung"])) {
            $dg->themdanhgia($_POST["sosao"], $_POST["txtnoidung"], $_POST["txtidmathang"], $_POST["txtidnguoidung"]);
            header("refresh: 0;");
        }
        include("detail.php");
        break;
    case "group":
        
        //$mathang = $mh->laymathangtrongkhoang($batdau,$soluong);
        if (isset($_GET["m"])) {
            $danhmuc_id = $_GET["m"];
        } else
            $danhmuc_id = 1;
        if (isset($_GET["h"])) {
            $hang_id = $_GET["h"];
        } else
            $hang_id = 1;
        if(isset($danhmuc_id))
        {
            $danhmuchientai = $dm->laydanhmuctheoid($danhmuc_id);
            $tongmh= $mh->demtongsomathangtheodanhmuc($danhmuc_id);
            $soluong=8;
            $tongsotrang=ceil($tongmh/$soluong);
            if(!isset($_GET["trang"])){
                $tranghh=1;
            }else
            {
                $tranghh=$_GET["trang"];
            }
            $batdau=($tranghh-1)*$soluong;
            $mathangtheodanhmuc = $mh->laymathangtheodanhmucsx($danhmuc_id,$batdau,$soluong);
            
        }
        if(isset($hang_id))
        {
            $hanghientai = $h->layhangtheoid($hang_id);
            $tongmh= $mh->demtongsomathangtheohang($danhmuc_id);
            $soluong=8;
            $tongsotrang=ceil($tongmh/$soluong);
            if(!isset($_GET["trang"])){
                $tranghh=1;
            }else
            {
                $tranghh=$_GET["trang"];
            }
            $batdau=($tranghh-1)*$soluong;
            $mathangtheohang = $mh->laymathangtheohangsx($hang_id,$batdau,$soluong);
        }
        if(isset($_POST["txttimkiem"]))
            {
                $kqtimkiem= $mh->timkiemmathang($_POST["txttimkiem"]);
            }
        include("group.php");
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        //include("admin/ktnguoidung/loginform.php");
        header("location:admin/");
        break;
    
    
    case "capnhat":
        $thongbao="";
        $id=$_POST["txtid"];
        $email=$_POST["txtemail"];
        $sodienthoai=$_POST["txtdienthoai"];
        $hoten=$_POST["txthoten"];
        $hinhanh= $_POST["txthinhanh"];
        //upload file
        if($_FILES["fhinh"]["name"]!=""){
            
            $tenfile=random_int(0,2147483647).".png";
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/icon/".$tenfile; //basename($_FILES["fhinh"]["name"]);// đường dẫn lưu csdl
            $duongdan = "" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        }
        $nd->capnhatnguoidung($id,$email,$sodienthoai,$hoten,$hinhanh);
        //gan lai thong tin moi
        
        $_SESSION["nguoidung"]=$nd->laythongtinnguoidung($_POST["txtemail"]);
        $thongbao="Cập nhật thành công!";
        //header("location:index.php");
        include("trangchu.php");
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
                $thongbao="Cập nhật thành công!";
                
            }
        //header("location:index.php");
        include("trangchu.php");
        break;
    case "danhgia":
        if (isset($_GET["id"])) {
            $mathang_id = $_GET["id"];
        } else
            $mathang_id = 1;
        
        $mathanghientai = $mh->laymathangtheoid($mathang_id);
        $mathangtheodanhmuc = $mh->laymathangtheodanhmuc($mathanghientai["danhmuc_id"]);
        $mh->tangluotxem($mathanghientai["id"]);
        $danhgiatheomathang = $dg->laybinhluantheomathang($mathanghientai["id"]);
        if (isset($_POST["txtnoidung"])) {
            $dg->themdanhgia($_POST["sosao"], $_POST["txtnoidung"], $_POST["txtidmathang"], $_POST["txtidnguoidung"]);
            header("refresh: 0;");
        }
        
        break;

    case "chovaogio":
        $id= $_REQUEST["id"];
        $soluong=$_REQUEST["soluong"];
        themhangvaogio($id,$soluong);
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "xemgiohang":
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "capnhatgiohang":
        $mh = $_REQUEST["mh"];
        foreach($mh as $mathang =>$soluong)
        {
            if($soluong>0)
                capnhatsoluong($mathang,$soluong);
            else
                xoamotmathang($mathang);
        }
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "xoa":
        $idx=$_REQUEST["id"];
        
        foreach($mh as $mathang)
        {
            if($soluong=!0 && $mh["id"]==$idx)
                xoamotmathang($mathang);
        }
        
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang=laygiohang();
        include("cart.php");
        break;
    case "datmua":
        $dc= new DIACHI();

        $giohang=laygiohang();
        include("thanhtoan.php");
        break;

    case "dathang":
        $hoten = $_POST["txthoten"];
        $email = $_POST["txtemail"];
        $sodienthoai = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];
        $nd= new NGUOIDUNG();
         //lưu khách hàng
        if($nd->laynguoidungtheoemail($email)<=0)
        {
            $kh = new NGUOIDUNG();
            $khachhang_id=$kh->dangkytaikhoanmuahang($hoten,$email,$sodienthoai);
            
        }else
        {
            $nguoidungkt=$nd->layttnguoidungtheoemail($email);
            $khachhang_id=$nguoidungkt["id"];
        }
        $nguoidungkt=$nd->layttnguoidungtheoemail($email);
       
        // Lưu địa chỉ
       
        
        $dc= new DIACHI();
        $kt=$dc->kiemtradiachi($nguoidungkt["id"]);
        if($kt>0)
        {
            $macdinh=$dc->laydouutien($khachhang_id);
            if($macdinh>0)
            {
                $macdinh=0;
            }else
             $macdinh=1;
            $diachi_id= $dc->themdiachi($khachhang_id,$diachi,$macdinh);
        }
        else{
            $diachi_id= $dc->themdiachi($khachhang_id,$diachi,1);
        }
        
        //lưu đơn hàng
        $dh= new DONHANG();
        $tongtien= tinhtiengiohang();
        $donhang_id=$dh->themdonhang($khachhang_id,$diachi_id,$tongtien);
        //Lưu chi tiết đơn hàng
        $ct = new DONHANGCT();
        $giohang = laygiohang();
        $mhang= new MATHANG();
        foreach($giohang as $mahang=>$mh)
        {
            $dongia=$mh["giaban"];
            $soluong= $mh["soluong"];
            $thanhtien= $mh["sotien"];
            $ct->themchitietdonhang($donhang_id,$mahang,$dongia,$soluong,$thanhtien);
            
            $mhang->capnhatsoluong($mahang,$soluong);
        }
        //xoa gio hang
        xoagiohang();



        include("dsdonhang.php");
        break;
    case "dsdonhang":
        include("dsdonhang.php");
        break;
    case "xoadonhangsanpham":
        $idct=$_GET["id"];
        $ct = new DONHANGCT();
        $dh = new DONHANG();
        $sanphamxoa=$ct->laygiadonhangctsanpham($idct);
        $soluongtrave=$sanphamxoa["soluong"];
        $mahang=$sanphamxoa["mathang_id"];
        $ct->xoadonhangsanpham($idct);
        $dh->capnhatsotiendonhang($sanphamxoa["donhang_id"],$sanphamxoa["thanhtien"]);
        $dh->xoadonhangtongtien();
        $mhang= new MATHANG();
        $mhang->capnhatsoluong2($mahang,$soluongtrave);
        include("trangchu.php");
        break;
    default:
        break;
}
