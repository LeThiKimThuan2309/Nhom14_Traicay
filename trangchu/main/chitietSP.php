<h2 align="center" style="color:#ffb90f;"><a style="text-codiration:none;">CHI TIẾT SẢN PHẨM</a></h2>
<br>
<?php
    $sql_chitiet="SELECT * FROM category ,product 
    WHERE category.id=product.id_category and product.id=$_GET[id] LIMIT 1";
     $query_chitiet = mysqli_query($conn,$sql_chitiet);
     while($row_chitiet = mysqli_fetch_array($query_chitiet)){ 
?>
<table   style="width: 900px; margin-left:300px;">
            <tr>
                <td align="left"><a style='color: purple;' href='javascript:window.history.back(-1);'><i class="fa fa-arrow-left" aria-hidden="true"></i></a></td>
                <td></td>
             </tr>
             <form method="post" action="main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id']?>">
                <tr>
                <td style="width:300px;"><img src="../BaiTapLon/Admin/The_Loai/upload/<?php echo $row_chitiet['thumbnail']?>" style="width:100%;" ></td>
                <td style="padding: 0px 10px;">
                    <ul style="list-style-type: none;margin-right:20px;">
                        <p style="text-size:30px;"><b> Tên trái cây</b> <?php echo $row_chitiet['title'] ?></p>
                        <p><b> Giá:</b><?php echo number_format( $row_chitiet['price'],0,',','.') ?> vnđ</p>
                        <p><b> Mô tả:</b><?php echo $row_chitiet['content'] ?></p>
                        <p ><input class="themgiohang"name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
                    </ul>
                </td>
             </tr>
            </form>
            
        </table>
<?php
     }
?>
