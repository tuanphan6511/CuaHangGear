<?php   
require("../../model/database.php");
require("../../model/nguoidung.php");
if(!isset($_SESSION["nguoidung"]))
{
    
    header("location:../index.php");
}else
{
    if($_SESSION["nguoidung"]["loai"]!=1)
    header("location:../");
    
}
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}
$nd = new NGUOIDUNG();
switch($action){
    case "thangcap":     
        $nd->thangcap($_GET["id"]);
        $nguoidung=$nd->laydanhsachnguoidung();
        
        include("main.php"); 
        
        break;
    case "hacap":   
        $nd->hacap($_GET["id"]);
        $nguoidung=$nd->laydanhsachnguoidung();  
        
        include("main.php");  
       
        break;
    case "capnhat":       
        header("location:../ktnguoidung/main.php");     
        break;
    case "xem":
        $nguoidung=$nd->laydanhsachnguoidung();  
        include("main.php");
        break;
    case "khoa":
        $nd->capnhatkhoa($_GET["trangthai"],$_GET["id"]);
        $nguoidung=$nd->laydanhsachnguoidung();  
        include("main.php");
        break;
    case "dangky":
        header("location:../ktnguoidung/index.php?action=dangky");
        break;
    case "forgot":
        $nd->forgot($_POST["txtid"],$_POST["txtsdt"]);
        $thongbao="Mật khẩu tài khoản đã được đặt lại. Mật khẩu là số điện thoại của tài khoản";
        $nguoidung=$nd->laydanhsachnguoidung();  
        include("main.php");
        
        break;
    case "index":        
        header("location:../ktnguoidung/main.php");
        break;
    default:
        break;
}
?>