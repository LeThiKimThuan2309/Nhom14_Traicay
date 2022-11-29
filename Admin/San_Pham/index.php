<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
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
            <a class="nav-link active" href="#">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../The_Loai/">Quản Lý Sản Phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../Gio_Hang/">Quản Ly Giỏ Hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../User/">Quản Lý Người Dùng</a>
        </li>
    </ul>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quan Ly Danh Mục</h2>
			</div>
			<div class="panel-body">

            <div class="row">
                <div class="col-lg-6">
                    <a href="them_moi.php"> 
                        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Danh Mục</button>
                    </a>
                </div>

                <div class="col-lg-6">
                <!----form tim kiem ---------------------------------------------->
                    <form method="get">
                        <div class="form-group" style="width: 200px; float: right;">
                            <input type="text" class="form-control" placeholder="Searching..." id="s" name="s">
                        </div>
                    </form>
                </div>
            </div>
            
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50px">STT</th>
                            <th>Tên Danh Mục</th>
                            <th width="50px">sửa</th>
                            <th width="50px">xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        //Lay danh sach danh muc tu database
                        $limit = 5; //số sản phẩm/1 trang
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

                        $s = '';
                        if(isset($_GET['s']))
                        {
                            $s = $_GET['s'];
                        }
                        $additiona = '';
                        if(!empty($s))
                        {
                            $additiona = ' and name like  "%'.$s.'%" ';
                        }
                        $sql = 'select * from category where 1 '.$additiona.' limit '.$firstIndex.','.$limit;


                        $categoryList = executeResult($sql);
                        $sql = 'select count(id) as total from category where 1'.$additiona;
                        $countResult = executeSingleResult($sql);

                        $number = 0;
                        if($countResult != null)
                        {
                            $count = $countResult['total'];
                            $number = ceil($count/$limit);
                        }
                        
                        foreach ($categoryList as $item) 
                        {
                            echo '<tr>
                                    <td>'.($firstIndex ++).'</td>
                                    <td>'.$item['name'].'</td>
                                    <td>
                                        <a href="them_moi.php?id='.$item['id'].'">
                                            <button class="btn btn-warning">Sửa</button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" 
                                            onclick="deleteCategory('.$item['id'].')">Xoá</button>
                                    </td>
                                    </tr>';
                        }
                        ?>
                    </tbody>
                </table>
        <!----------Bai toán phân trang--------------------------------------------------------->
                <?=paginarion($number, $page, '&s='.$s)?>
			</div>
		</div>
	</div>
    <script type="text/javascript">
		function deleteCategory(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>