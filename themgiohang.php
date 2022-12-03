<?php
    session_start();
    include("../../sql/config.php");
    //them
    //tru
    //xoa san pham
    //xoa tat ca
    //themsanpham vao gio hang
    if(isset($_POST['themgiohang'])){
        // session_destroy();
        $id=$_GET['idsanpham'];
        $amount = 1;
        $sql = "SELECT * FROM product WHERE id='".$id."' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $row= mysqli_fetch_array($query);
        if($row){
            $new_product=array(array('title'=>$row['title'],'id'=>$id,'price'=>$row['price'],'amount'=>$amount,'thumbnail'=>$row['thumbnail']));
        ///kiem tra session gio hàng ton tai
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    ///Nếu dữ liệu trùng
                    if($cart_item['id']==$id){
                        $product[]=array('title'=>$cart_item['title'],'id'=>$cart_item['id'],'price'=>$cart_item['price'],'amount'=>$cart_item['amount']+1,'thumbnail'=>$cart_item['thumbnail']);
                        $found = true;
                    }else{
                    ////Nếu dữ liệu không trùng
                        $product[]=array('title'=>$cart_item['title'],'id'=>$cart_item['id'],'price'=>$cart_item['price'],'amount'=>$cart_item['amount'],'thumbnail'=>$cart_item['thumbnail']);
                    }
                }
                if($found==false){
                ///Liên kết dữ liệu new_product với product
                    $_SESSION['cart']=array_merge($product,$new_product);
                }
                else{
                    $_SESSION['cart']=$product;
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
         header('Location:../index.php?quanly=giohang');

    }
?>