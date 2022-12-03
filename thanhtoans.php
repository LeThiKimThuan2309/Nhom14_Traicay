<?php 
    include("../../BaiTapLon/db/config.php");
    session_start();
  
    if(isset($_SESSION['username']) && isset($_SESSION['id_khachhang']) )
    {   
        $khachhang = $_SESSION['username'];
        $code_order = rand(0,9999);
        $insret_cart = "INSERT INTO tbl_cart(khachhang,code_cart,cart_status) VALUES('$khachhang','$code_order',1)";
        $cart_query = mysqli_query($conn,$insret_cart);
        if($insret_cart){
            //them gio hang chi tiet
            foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $amount = $value['amount'];
            $insert_order_details =  "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluong) VALUES ('$id_sanpham','$code_order','$amount')";
            mysqli_query($conn,$insert_order_details);
            }
        }
        unset ($_SESSION['cart']);
        echo "<h2 style='text-align:center;color:red; text-size:50px;'>Bạn đã đặt hàng thành công!!!</h2>";
        echo"<a href='../index.php' style='color:#444444;'>Trở về</a>";
    }
    else
  
    echo"<a href='../dangnhap.php' style='color:#444444;'>Đăng nhập</a>";
    
 
?>
