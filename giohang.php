
<h2 align="center" ><a style="color:#000; text-decoration:none;">GIỎ HÀNG CỦA BẠN</a></h2>
<?php
    // session_start();
?>
<?php 
    if(isset($_SESSION['cart'])){
        // print_r($_SESSION['cart']);
    }
?>
<style>
    table{
        width:100%;
    }
    table, th, td {
        border:1px solid black;
        /* margin-left:100px; */
        text-align:center;
    }
    img{
        width:100px;
    }
</style>
<table >
  <tr>
    <th>Id</th>
    <th>Tên trái cây</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Xử lý</th>

  </tr>
  <?php
    if(isset($_SESSION['cart'])){
        $i=0;
        $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien=$cart_item['amount']*$cart_item['price'];
            $tongtien+=$thanhtien;
            $i++;
?>
        <tr style="text-decoration:none;">
            <td ><?php echo $i; ?></td>
            <td><?php echo $cart_item['title'];?></td>
            <td><img src="../BaiTapLon/Admin/The_Loai/upload/<?php echo $cart_item['thumbnail'];?>"></td>
            <td>
                <a href="main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa fa-plus fa-style"></i></a>
                <?php echo $cart_item['amount'];?>
                <a href="main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa fa-minus fa-style"></i></a>
            </td>
            <td><?php echo $cart_item['price'];?></td>  
            <td><?php echo number_format ($thanhtien,0,',','.'). 'vnđ';?></td>   
            <td><a href="main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xóa</a></td>   
        </tr>

<?php
        }
?>
    <tr>
         <td colspan="8" align="center">
            <p style="float:center;">Tổng tiền <?php echo number_format($tongtien,0,',','.').'vnđ'?></p></br>
            <p style="float:right;"><a href="">Xóa tất cả</a></p>

            <div style="clear:both;"></div>
            
                <p><a href="main/thanhtoan.php">Đặt hàng</p>
         </td>   
    </tr>
<?php
    }else{
?>
    <tr>
         <td colspan="8"><p>Giỏ hàng trống</p></td>
    </tr>
<?php
}
?>
</table>


