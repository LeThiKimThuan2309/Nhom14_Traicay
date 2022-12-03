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
            <a class="nav-link " href="../The_Loai/">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../User/">Quản Lý Người Dùng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Quản Lý Giỏ Hàng</a>
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
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">

                <div class="row">
                    <div class="col-lg-6">
                    <!----form tim kiem ---------------------------------------------->
                        <form method="get">
                            <div class="form-group" style="width: 200px; float: left;">
                                <input type="text" class="form-control" placeholder="Searching..." id="s" name="s">
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên Khách Hàng</th>
                            <th>Mã Đặt Hàng</th>
                            <th width="50px">xóa</th>
                            <th width="100px">
                                chi tiet
                            </th>
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
                        //bài toán tìm kiếm 
                        $s = '';
                        if(isset($_GET['s']))
                        {
                            $s = $_GET['s'];
                        }
                        $additiona = '';
                        if(!empty($s))
                        {
                            $additiona = ' and product.title like  "%'.$s.'%" ';
                        }

                        //Lay danh sach danh muc tu database
                        $sql = 'select * from tbl_cart where 1 '.$additiona.' limit '.$firstIndex.','.$limit;
                        $tblcartList = executeResult($sql); 
                        $sql = 'select count(id) as total from tbl_cart where 1'.$additiona;
                        $countResult = executeSingleResult($sql);

                        $number = 0;
                        if($countResult != null)
                        {
                            $count = $countResult['total'];
                            $number = ceil($count/$limit);
                        }

                        $index = 1;
                        foreach ($tblcartList as $item) 
                        {
                            echo '<tr align="center">
                                    <td>'.($index++).'</td>
                                    <td>'.$item['khachhang'].'</td>
                                    <td>'.$item['code_cart'].'</td>
                                    <td>
                                        <button class="btn btn-danger" 
                                            onclick="deleteProduct('.$item['id'].')">Xoá</button>
                                    </td>
                                    <td align="center">
                                        <a href="../Gio_Hang/chitiet.php">chi tiet</a>
                                    </td>
                                    </tr>';
                                
                        }
                        ?>
                    </tbody>
                </table>
                <!----------Bai toán phân trang--------------------------------------------------------->
                <?=paginarion($number, $page, '')?>
			</div>
		</div>
	</div>
    <script type="text/javascript">
		function deleteProduct(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if(!option) {
				return;
			} 

			console.log(id)
			//ajax - lenh post
			$.post('GH_ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>