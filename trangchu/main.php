<div class="main"> 

        <?php
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            }else{
                $tam='';
            }
            if($tam=='danhmuc'){
                include("../trangchu/main/danhmuc.php");
            }elseif($tam=='trangchu'){
                include("../trangchu/main/trangsp.php");
            }elseif($tam=='sanpham'){
                include("../trangchu/main/chitietSP.php");
            }elseif($tam=='giohang'){
                include("../trangchu/main/giohang.php");
            }else{
                include("../trangchu/main/trangsp.php");
            }
           
        ?>

            
        </div>