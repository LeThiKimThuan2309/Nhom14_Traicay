<?php
    session_start();
    $_SESSION['dangxuat']="Đăng xuất";
    $sql_danhmuc = "SELECT * FROM `category` ORDER BY id ASC";
    $query_danhmuc = mysqli_query($conn,$sql_danhmuc);
?>
<div id="header"> 
            <h1 align="center" style="color:#ffb90f">CỬA HÀNG TRÁI CÂY SẠCH</h1>
            <form action="index.php?quanly=timkiem" method="get" style="float:right;" >
                    <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa" size="40">
                    <input type="submit" name="timkiem" value="Tìm kiếm"> </form>
            <div class="nav">
                <ul class="list_nav">
                    <li><a href="index.php?quanly=trangchu">Trang Chủ</li>
                    <?php
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    ?>
                        <!-- <li class="has_list"><a href=""> DANH MỤC SẢN PHẨM <i class="fa fa-caret-down" aria-hidden="true"></i>
                            <div class="submenu"> -->
                            <ul style="list-style:none;">
                                <li><a href="index.php?quanly=danhmuc&id=<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['name']?></a></li>
                                <!-- <li><a href="index.php?id=<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['name']?></a></li>
                                <li><a href="index.php?id=<?php echo $row_danhmuc['id']?>"><?php echo $row_danhmuc['name']?></a></li> -->
                            </ul>
                            <!-- </div>
                         </li> -->
                        <?php
                        }
                        ?>
                    
                    <li><a href="index.php">Bài Tập</li>
                    <li><a href="index.php">Thông tin</li>
                    <li style="float:right;">
                    <?php
                        if(isset($_SESSION['username'])&& $_SESSION['username']) 
                        { echo "<b>";
                        echo $_SESSION['username'];
                        echo "</b>";
                        echo "<a href='dangxuat.php'>";
                        echo "<b>";
                        echo "<br> Đăng xuất";
                        echo "</b>";
                        echo "</a>";
                        echo "<a href='doimatkhau.php'>";
                        echo "<b>";
                        echo "<br> Đổi mật khẩu";
                        echo "</b>";
                        echo "</a>";
                        }
                        else
                        echo "<a href='dangnhap.php'>Đăng Nhập</a>";
                        ?></a>
                     
                    </li>
                    <li style="float:right;"><a href="index.php?quanly=giohang"><i class="fa fa-shopping-cart" style="color: black;"></i> Giỏ hàng</li>  
                </ul>

            </div>
           
</div>