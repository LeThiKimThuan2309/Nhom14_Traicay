<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
    require_once('../../db/dbhelper.php');
    require_once('../../common/tien_ich.php');
    session_start();
    $_SESSION['dangxuat']="Đăng xuất";
?>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="../San_pham/">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../The_Loai/index.php">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../User/">Quản Lý Người Dùng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Gio_Hang">Quản Lý Giỏ Hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Chi Tiết Đơn Hàng</a>
        </li>
        <?php
             if(isset($_SESSION['username'])&& $_SESSION['username']) 
                { echo "<ul style='list-style-type: none; display:flex;float:right;'>";
                    echo "<li>" ;
                    echo "<i>";
                    echo $_SESSION['username'];
                    echo "</i>";
                    echo "</li>";
                    echo "<li>" ;
                    echo "<i>";
                    echo $_SESSION['id_khachhang'];
                    echo "</i>";
                    echo "</li>";
                    echo "<li>";
                    echo "<a href='/BT/NHOM/trangchu/dangxuat.php' style='text-decoration:none;padding:5px 10px;'>";
                    echo "Đăng xuất";
                    echo "</a>";
                    echo "</li>";
                    echo "<li >";
                    echo "<a href='/BT/NHOM/trangchu/doimatkhau.php' style='text-decoration:none;padding:5px 10px;'>";
                            
                    echo "Đổi mật khẩu";
                            
                    echo "</a>";
                    echo "</li>";
                    }
                    else
                   
                echo "<li style='list-style-type: none; display:flex;float:right;padding:5px 10px;'><a href='../Admin/dangnhap.php'style='text-decoration:none;'>Đăng Nhập</a></li>";?>
    </ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Chi Tiết Đơn Hàng</h2>
			</div>
			<div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <tr>
                            <th width="50px">STT</th>
                            <th>Mã Đặt Hàng</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá Bán</th>
                            <th>Tổng Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //Lay danh sach danh muc tu database
                        $limit = 10; //số sản phẩm/1 trang
                        $page = 1;
                        if(isset($_GET['page']))
                        {
                            $page = $_GET['page'];
                        }
                        if($page <= 0)
                        {
                            $page = 1;
                        }
                        $firstIndex = ($page-1)*$limit;

                        //Lay danh sach danh muc tu database
                        $sql = 'SELECT * FROM tbl_cart_details left join product on 
                            tbl_cart_details.id_sanpham = product.id '.' limit '.$firstIndex.','.$limit;
                        // $tbl_cart_detailsList = executeResult($sql); 
                        $query_pro = mysqli_query($conn,$sql);
                        $sql = 'select count(id_cart_details) as total from  tbl_cart_details where 1';
                        $countResult = executeSingleResult($sql);
                        
                        $number = 0;
                        if($countResult != null)
                        {
                            $count = $countResult['total'];
                            $number = ceil($count/$limit);
                        }
            ?>
                        <!-- $index = 1;
                        foreach ($tbl_cart_detailsList as $item) 
                        {
                            echo '<tr>
                                    <td>'.($index++).'</td>
                                    <td>'.$item['code_cart'].'</td>
                                    <td>'.$item['title'].'</td>
                                    <td>'.$item['soluong'].'</td>
                                    <td>'.$item['price'].'</td>
                                    <td>'.$tong.'</td>
                                    </tr>';
                        } -->
                        <?php
                        $index = 1;
                        while($row = mysqli_fetch_array($query_pro)){
                        ?>
                            <tr align="center">
                                    <td> <?php echo ($index++)?></td>
                                    <td><?php echo $row['code_cart']?></td>
                                    <td> <?php echo $row['title']?></td>
                                    <td><?php echo $row['soluong']?></td>
                                    <td><?php echo number_format( $row['price'],0,',','.')?> vnd/kg</td>
                                    <td><?php echo number_format($row['price']*$row['soluong'],0,',','.')?> vnd</td>
                                    </tr>
                        <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
                <!----------Bai toán phân trang--------------------------------------------------------->
			</div>
		</div>
	</div>
    <!-- <script type="text/javascript">
		function deleteProduct(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if(!option) {
				return;
			} 

			console.log(id)
			//ajax - lenh post
			$.post('TL_ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script> -->
</body>
</html>