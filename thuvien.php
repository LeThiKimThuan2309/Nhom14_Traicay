<?php
function taodonhang($Ten, $DiaChi, $DienThoai, $Email, $Tonggiatri, $Phuongthuctt){
    $conn=ketnoidb();
        $sql = "INSERT INTO hoadon (Ten, DiaChi, DienThoai, Email, Tonggiatri, Phuongthuctt)
        VALUES ('$Ten', '$DiaChi', '$DienThoai', '$Email', '$Tonggiatri', '$Phuongthuctt')";
        // use exec() because no results are returned
        $conn->exec($sql);
      
      $conn = null;
}

function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td><img src="images/'.$_SESSION['giohang'][$i][0].'" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.'</div>
                            </td>
                            <td>
                                <a href="cart.php?delid='.$i.'">Xóa</a>
                            </td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.'</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Giỏ hàng rỗng!";
            }    
        }
    }
 ?>   