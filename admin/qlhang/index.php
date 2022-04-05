<?php 
if(!isset($_SESSION["nguoidung"]))
{
    
    header("location:../index.php");
}else
{
    if($_SESSION["nguoidung"]["loai"]!=1&&$_SESSION["nguoidung"]["loai"]!=2)
    header("location:../../index.php");
    
}
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/hang.php");
require("../../model/mathang.php");
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="danhsach";
}
$mh= new MATHANG();
$h = new HANG();
$idsua =0;
switch($action){
    case "index":        
        header("location:../ktnguoidung/main.php");
        break;
    case "capnhat":        
        header("location:../ktnguoidung");
        include("main.php");
        break;
    case "danhsach":
        $hang=$h->layhang();      
        include("main.php");
        break;
    case "xulythem":
        $h->themhang($_POST["txtten"]);
        $hang=$h->layhang();
        include("main.php");
        break;
    case "sua":
        $idsua= $_GET["id"];
        $hang=$h->layhang();      
        include("main.php");
        break;
    case "xulysua":
        $h->suahang($_POST["txtid"],$_POST["txtten"]);
        $hang=$h->layhang();      
        include("main.php");
        break;
    case "xoa":
        $h->xoahang($_GET["id"]);
        $hang=$h->layhang();
        include("main.php");
        break;
    default:
        break;
}
?>
