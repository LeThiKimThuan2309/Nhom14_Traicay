<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM product,category WHERE product.id_category = category.id 
AND product.title  LIKE '%".$tukhoa."%'";
 
   $query_pro = mysqli_query($conn,$sql_pro);
   
?>
<h2 ><a style="color:#000; text-decoration:none;">Từ khóa tìm kiếm:<?php echo $_POST['tukhoa'];?></a></h2>
<ul class="product_list" style="margin-left:450px;">
    <?php 
    while($row_pro = mysqli_fetch_array($query_pro) ){
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id']?>">
            <img src="../BaiTapLon/Admin/The_Loai/upload/<?php echo $row_pro['thumbnail']?>"style="width:100%;">
            <p class="title_product"> <?php echo $row_pro['title']?></p>
            <p style="color:black;">Giá: <?php echo number_format( $row_pro['price'],0,',','.')?> vnđ/kg</p>
            <p><input class="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
            </a>
        </li>
               
    <?php
    }
    ?>           
</ul>