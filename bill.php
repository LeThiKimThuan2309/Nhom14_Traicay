<?php
    if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
        //lay thong tin tu from de tao don hang
         $name=$_POST['hoten'];
         $name=$_POST['diachi']; 
         $name=$_POST['dienthoai'];
         $name=$_POST['email'];
         $Phuongthuctt=0;
         $Tonggiatri=tonggiatri();  


         //insert don hang- tao don hang moi
     taodonhang($Ten, $DiaChi, $DienThoai, $Email, $Tonggiatri, $Phuongthuctt);

        //lay thong tin gio hang tu session +id don hang vua tao

        //insert vao gio hang
        //show confirm don hang

        //unset gio hang session
    echo "Bạn đã tạo thành công đơn hàng của bạn là:";
}

?>