<?php
   $sql_pro = "SELECT * FROM category a,product b 
   WHERE a.id=b.id_category  ORDER BY a.id DESC";
   $query_pro = mysqli_query($conn,$sql_pro);
   $row_title = mysqli_fetch_array($query_pro);
?>
<h3>San oham hienco</h3>
<ul class="product_list">
    <?php 
    while($row_pro = mysqli_fetch_array($query_pro) ){
        ?>
        <li>
            <a href="">
            <img src="<?php echo $row_pro['thumbnail']?>"style="width:100%;">
            <p class="title_product">Tên: <?php echo $row_pro['title']?></p>
            <p>Giá: <?php echo $row_pro['price']?></p>
            <!-- <p>Mô tả: <?php echo $row_pro['content']?></p> -->
            </a>
            <p>
        </li>
               
<?php
}
?>           
</ul>