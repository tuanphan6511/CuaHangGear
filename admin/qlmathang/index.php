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
    require_once("../../model/hang.php");
// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="danhsach";
}

$dm = new DANHMUC();
$h = new HANG();
$mh= new MATHANG();
switch($action){
    case "capnhat":        
        header("location:../ktnguoidung");
        include("main.php");
        break;
    case "danhsach":
        $mathang=$mh->laymathangtheohdm();      
        include("main.php");
        break;  
    case "them":
        $danhmuc=$dm->laydanhmuc();
        $hang=$h->layhang();
        include("addform.php");
        break;
    case "xulythem":
        //upload hinh
        //Hinh anh chinh
        $tenfile=random_int(0,2147483647).".png";
        //$hinhanh="images/".basename($_FILES["filehinhanh1"]["name"]);
        $hinhanh="images/".$tenfile;
        $duongdan="../../".$hinhanh;// noi uploadfile
        move_uploaded_file($_FILES["filehinhanh1"]["tmp_name"],$duongdan);
        //Hinh anh 2
        if($_FILES["filehinhanh2"]["name"]==null)
        {
            $tenfile2=random_int(0,2147483647).".png";
            $duongdan2=$duongdan;
            //move_uploaded_file($_FILES["filehinhanh2"]["tmp_name"],$duongdan2);
            $hinhanh2="images/".$tenfile;
        }else
        {
            $tenfile2=random_int(0,2147483647).".png";
            $hinhanh2="images/".$tenfile2;
            $duongdan2="../../".$hinhanh2;// noi uploadfile
            move_uploaded_file($_FILES["filehinhanh2"]["tmp_name"],$duongdan2);
        }
        if($_FILES["filehinhanh3"]["name"]==null)
        {
            $tenfile3=random_int(0,2147483647).".png";
            $duongdan3=$duongdan;
            //move_uploaded_file($_FILES["filehinhanh3"]["tmp_name"],$duongdan3);
            $hinhanh3="images/".$tenfile;
        }else
        {
            $tenfile3=random_int(0,2147483647).".png";
            $hinhanh3="images/".$tenfile3;
            $duongdan3="../../".$hinhanh3;// noi uploadfile
            move_uploaded_file($_FILES["filehinhanh3"]["tmp_name"],$duongdan3);
        }
        
        //Hinh anh 3
        //them mat hang
        $tenmathang= $_POST["txttenmathang"];
        $mota =$_POST["txtmota"];
        $giaban=$_POST["txtgiaban"];
        $soluongton=$_POST["txtsoluongton"];
        $nsx=$_POST["txtnsx"];
        $tinhtrang=$_POST["txttinhtrang"];
        $baohanh=$_POST["txtbaohanh"];
        $danhmuc_id=$_POST["optdanhmuc"];
        $hang_id=$_POST["opthang"];
        $mh->themmathang($tenmathang,$mota,$giaban,$soluongton,$nsx,$tinhtrang,$baohanh,$hinhanh,$hinhanh2,$hinhanh3,$danhmuc_id,$hang_id);
        $mathang=$mh->laymathang();      
        include("main.php");
        break;
    
    case "sua":
        $idsua= $_GET["id"];
        $danhmuc=$dm->laydanhmuc();
        $hang=$h->layhang();
        $mathanghientai=$mh->laymathangtheoid($idsua);      
        include("update.php");
        break;
    case "xulysua":
        $mhfix=$mh->laymathangtheoid($_POST["txtid"]);
        
        if($_FILES["filehinhanh1"]["name"]==null)
        {
            $hinhanh= $mhfix["hinhanh1"];
            
        }else
        {
            $tenfile=random_int(0,2147483647).".png";
            $hinhanh="images/".$tenfile;
            $duongdan="../../".$hinhanh;// noi uploadfile
            move_uploaded_file($_FILES["filehinhanh1"]["tmp_name"],$duongdan);
        }
       
        
        if($_FILES["filehinhanh2"]["name"]==null)
        {
            $hinhanh2= $mhfix["hinhanh2"];
            
        }else
        {
            $tenfile2=random_int(0,2147483647).".png";
            $hinhanh2="images/".$tenfile2;
            $duongdan2="../../".$hinhanh2;// noi uploadfile
            move_uploaded_file($_FILES["filehinhanh2"]["tmp_name"],$duongdan2);

        }
        
        
        if($_FILES["filehinhanh3"]["name"]==null)
        {
            $hinhanh3= $mhfix["hinhanh3"];
        }else
        {
            $tenfile3=random_int(0,2147483647).".png";
            $hinhanh3="images/".$tenfile3;
            $duongdan3="../../".$hinhanh3;// noi uploadfile
            move_uploaded_file($_FILES["filehinhanh3"]["tmp_name"],$duongdan3);
        }
        
        $tenmathang= $_POST["txttenmathang"];
        $mota =$_POST["txtmota"];
        $giaban=$_POST["txtgiaban"];
        $soluongton=$_POST["txtsoluongton"];
        $nsx=$_POST["txtnsx"];
        $tinhtrang=$_POST["txttinhtrang"];
        $baohanh=$_POST["txtbaohanh"];
        $danhmuc_id=$_POST["optdanhmuc"];
        $hang_id=$_POST["opthang"];
        $luotxem=$_POST["txtluotxem"];
        $luotmua=$_POST["txtluotmua"];
        $id=$_POST["txtid"];
        $mh->suamathang($tenmathang,$mota ,$giaban,$soluongton,$nsx,$tinhtrang,$baohanh,$hinhanh,$hinhanh2,$hinhanh3,$danhmuc_id,$hang_id,$luotxem,$luotmua,$id);
        $mathang=$mh->laymathang();
        $hang=$h->layhang();
        $danhmuc=$dm->laydanhmuc(); 
        $mathang=$mh->laymathangtheohdm();      
        
        include("main.php");
        break;
    
    case "xoa":
        $mh->xoamathang($_GET["id"]);
        $mathang=$mh->laymathang();
        include("main.php");
        break;
    case "index":        
        header("location:../ktnguoidung/main.php");
        break;   
    default:
        break;
}
?>
