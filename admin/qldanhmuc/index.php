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
    require_once("../../model/mathang.php");



// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="danhsach";
}
$mh= new MATHANG();
$dm = new DANHMUC();
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
        $danhmuc=$dm->laydanhmuc();      
        include("main.php");
        break;
    case "xulythem":
        $dm->themdanhmuc($_POST["txtten"]);
        $danhmuc=$dm->laydanhmuc();
        include("main.php");
        break;
    case "sua":
        $idsua= $_GET["id"];
        $danhmuc=$dm->laydanhmuc();      
        include("main.php");
        break;
    case "xulysua":
        $dm->suadanhmuc($_POST["txtid"],$_POST["txtten"]);
        $danhmuc=$dm->laydanhmuc();      
        include("main.php");
        break;
    case "xoa":
        $dm->xoadanhmuc($_GET["id"]);
        $danhmuc=$dm->laydanhmuc();
        include("main.php");
        break;
    default:
        break;
}
?>
