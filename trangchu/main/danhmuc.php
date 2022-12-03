<?php
   $sql_pro = "SELECT * FROM product 
   WHERE product.id_category='$_GET[id]'
   ORDER BY id_category DESC";
   $query_pro = mysqli_query($conn,$sql_pro);

   $sql_ten = "SELECT * FROM category WHERE category.id = $_GET[id] LIMIT 1 ";
   $query_ten = mysqli_query($conn,$sql_ten);
   $row_title = mysqli_fetch_array($query_ten);
?>
<h3  style=" margin-left:20px;"><a style="text-decoration:none;color: #ffb90f;">DANH MỤC SẢN PHẨM:</a> <?php echo $row_title['name']?></h3>
<ul class="product_list">
    <?php 
    while($row_pro = mysqli_fetch_array($query_pro) ){
        ?>
        <!-- <form method="post" action="main/themgiohang.php?idsanpham=<?php echo $row_pro['id']?>"> -->
        <li>
       
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id']?>">
            <img src="../BaiTapLon/Admin/The_Loai/upload/<?php echo $row_pro['thumbnail']?>" style="width:100%;">
            <p class="title_product"><?php echo $row_pro['title']?></p>
            <p style="color:black;">Giá: <?php echo number_format( $row_pro['price'],0,',','.')?> vnđ/kg</p>
            <!-- <p><input class="themgiohang" type="submit" value="Thêm giỏ hàng"></p> -->
            </a>
  
        </li>
    <!-- </form>           -->
<?php
}
?>   
