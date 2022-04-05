<?php 

if(!isset($_SESSION["nguoidung"]))
{
    
    header("location:../index.php");
}else
{
    if($_SESSION["nguoidung"]["loai"]!=1&&$_SESSION["nguoidung"]["loai"]!=2)
    header("location:../../index.php");
    
}
    
    require_once("../../model/database.php");
    require_once("../../model/danhmuc.php");
    require_once("../../model/donhang.php");
    require_once("../../model/donhangct.php");
    require_once("../../model/nguoidung.php");
    require_once("../../model/mathang.php");
    require_once("../../model/diachi.php");
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="danhsach";
}


$ct = new DONHANGCT();
$dh = new DONHANG();
$mh = new MATHANG();
$dc = new DIACHI();
$idsua =0;
switch($action){
    case "index":        
        header("location:../ktnguoidung/main.php");
        break;
    case "donhangcanduyet":
        $dsdiachi=$dc->laydsdiachi();
        $dsmh=$mh->laymathang();
        
        include("donhangcanduyet.php");
        break;
    case "tiepnhan":
        $dsdiachi=$dc->laydsdiachi();
        $dsmh=$mh->laymathang();
        $ct->tiepnhan($_GET["id"],1);
        $thongbao=1;
        $idthonbao=$_GET["id"];
        include("donhangcanduyet.php");
        break;
    case "huydon":
        $dsdiachi=$dc->laydsdiachi();
        $dsmh=$mh->laymathang();
        $ct->tiepnhan($_POST["txtid"],2);
        $thongbao=2;
        $ct->capnhatghichu($_POST["txtid"],$_POST["txtlido"]);
        include("donhangcanduyet.php");
        break;
    case "tiepnhantatca":
        $ct->tiepnhantatca();
        $dsdiachi=$dc->laydsdiachi();
        $dsmh=$mh->laymathang();
        
        include("donhangcanduyet.php");
        break;
    default:
        break;
}
?>
