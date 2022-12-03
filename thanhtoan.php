
<?php 
    session_start();
    include("../../sql/config.php");   
    // if(isset($_SESSION['username']))
    {   
        $id_khachhang = $_SESSION['id_khachhang'];
        $code_order = rand(0,9999);
        $insret_cart = "INSERT INTO tbl_cart(id_khachhang,code_card,card_status) VALUE('$id_khachhang','$code_order',1)";
        $cart_query = mysqli_query($insret_cart);
        if($insret_cart){
            //them gio hang chi tiet
            foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $amount = $value['amount'];
            $insert_order_details =  "INSERT INTO tbl_cart_details(id_sanpham,code_card,soluong) VALUE ('$id_sanpham','$code_order','$amount')";
            mysqli_query($mysqli,$insert_order_details);
            }
        }
    }
    // echo"<a href='dangnhap.php' style='color:#444444;'>Đăng nhập</a>";
    unset ($_SESSION['cart']);
 
?>