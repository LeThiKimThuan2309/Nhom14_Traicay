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
?>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="../San_pham/">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../The_Loai/">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Gio_Hang/">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Quản Lý Người Dùng</a>
        </li>
    </ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Người Dùng</h2>
			</div>
			<div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên Người Dùng</th>
                            <th>Gmail</th>
                            <th width="50px">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //lấy danh sách người dùng từ database
                        $limit = 1; //số sản phẩm/1 trang
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
                        //lấy danh sách người dùng từ database
                        $sql = 'select * from nguoimua';
                        $NguoiMuaList = executeResult($sql); 
                        $sql = 'select count(id) as total from product where 1';
                        $countResult = executeSingleResult($sql);

                        $number = 0;
                        if($countResult != null)
                        {
                            $count = $countResult['total'];
                            $number = ceil($count/$limit);
                        }

                        $index = 1;
                        foreach ($NguoiMuaList as $item) 
                        {
                            echo '<tr>
                                    <td>'.($index++).'</td>
                                    <td>'.$item['ten_kh'].'</td>
                                    <td>'.$item['email'].'</td>
                                    <td>
                                        <button class="btn btn-danger" 
                                            onclick="deleteProduct('.$item['id'].')">Xoá</button>
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
		function deleteProduct(id) 
        //ajax - lệnh post
        {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if(!option) {
				return;
			} 

			console.log(id)
			//ajax - lenh post
			$.post('user_ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>