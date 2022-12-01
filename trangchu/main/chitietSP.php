<p>CHI TIẾT SẢN PHẨM</p>
<?php
    $sql_chitiet = $sql_pro = "SELECT * FROM category a,product b 
    WHERE a.id=b.id_category and b.id_category=$_GET[id] LIMIT 1";
     $query_chitiet = mysqli_query($conn,$sql_chitiet);
     while($row_chitiet = mysqli_fetch_array($query_chitiet)){ 
?>

<div class="hinhanh_sanpham">
<img src="<?php echo $row_chitiet['thumbnail']?>" style="width:150px;">

</div>
<div class="chitiet_sanpham">
</div>

<?php
     }
?>