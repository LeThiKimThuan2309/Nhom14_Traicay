<?php
   $sql_pro = "SELECT * FROM category a,product b WHERE a.id=b.id_category and b.id_category=$_GET[id] ORDER BY a.id DESC";
   $query_pro = mysqli_query($conn,$sql_pro);
   $row_title = mysqli_fetch_array($query_pro);
?>
<h3>Danh mục sản phẩm: <?php echo $row_title['name']?></h3>
<ul class="product_list">
    <?php 
    while($row_pro = mysqli_fetch_array($query_pro) ){
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id']?>">
            <img src="<?php echo $row_pro['thumbnail']?>">
            <p class="title_product">Tên trái cây: <?php echo $row_pro['title']?>Nhãn</p>
            <p>Giá: <?php echo $row_pro['price']?></p>
            <!-- <p>Mô tả: <?php echo $row_pro['content']?></p> -->
            </a>
        </li>
               
<?php
}
?>           
</ul>