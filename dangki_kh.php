<?php
include('database.php');
//kiểm tra tên người dùng này đã có người dùng chưa
function ktus($user)
{
    include('database.php');
    $sql="SELECT * FROM nguoimua WHERE ten_kh='$user'";
    $rs=mysqli_query($conn,$sql);
    if(mysqli_num_rows($rs)>0)
    {
        return false;
    }
    return true;
}

function ktem($email)
{
    $em="/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if(!preg_match($em, $email)) {
        return false;
    }
    return true;
   
}
//hàm kt email có được sử dụng chưa
function ktema($email)
{
    include('database.php');
    $sql1="SELECT * FROM nguoimua WHERE email='$email'";
    if(mysqli_num_rows(mysqli_query($conn,$sql1))>0)
    {
        return false;
    }
    return true;
}
if(isset($_POST['dangky'])&& $_POST['username']!='' &&$_POST['passw']!='' && $_POST['email']!=''  &&$_POST['gioitinh']!='')
{
   $user=$_POST['username'];
   $pass=$_POST['passw'];
   $email=$_POST['email'];
   $gt=$_POST['gioitinh'];
   $password = md5($pass);
    
    if(ktus($user)==false)
    {
        $rs="Tên User đã được sử dụng!";
    }
    if(ktem($email)==false)
    {
        $rs="Email không đúng định dạng!";
    }
    if(ktema($email)==false)
    {
        $rs="Email đã được sử dụng!";
    }
    else
    if(ktus($user)==true &&ktem($email)==true && ktema($email)==true)
    {
    $query="INSERT INTO nguoimua(ten_kh,email,password,gioitinh)VALUES ('$user','$email','$password','$gt')";
    $result=mysqli_query($conn,$query);
    $rs="Bạn đã đăng ký thành công!";
    }

}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<style>
    body{
            background-image: url("./img/bg.jpg");
            width:100%;
             height:100%;
             background-size: 100% 100%;
             background-repeat: no-repeat;
             background-attachment: fixed;
    }
</style>
<body>
    <form action="" method="post">
        <table align='center' >
            <tr>
                <td align='center' colspan='2'><p align='center'><font size='7' color='#CC6600'>Đăng ký</font></p></td>
            </tr>
            <tr height='40px'>
                <td><font size='4' color='#990000'>Tên đăng nhập:</font></td>
                <td><input type="text" name="username" style="height: 25px; width:  300px; border-radius: 10px;"required></td>
            </tr>
            <tr height='40px'>
                <td><font size='4' color='#990000'>Mật khẩu:</font></td>
                <td><input type="password" name="passw" style="height: 25px;width:  300px; border-radius: 10px;"  required></td>
            </tr>
            <tr height='40px'>
                <td><font size='4' color='#990000'>Email:</font></td>
                <td><input type="text" name="email" style="height: 25px; width:  300px; border-radius: 10px;" required></td>
            </tr>
            <tr height='40px'>
                <td><font size='4' color='#990000'>Giới tính</font></td>
                <td>
                        <select name="gioitinh" style="border: 1px solid #aaa; height:25px; width:90px;color:#444444;">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </td>
            </tr>
            <tr>
                <td align='center' colspan='2'>
                    <input type="submit" name="dangky" value="Đăng ký" style="background: #FFCCFF;border-color: #FFCCFF; border-radius: 5px; height:25px; width:90px; color:#444444;">

                </td>
            </tr>
            <tr>
                
                <td align='center'colspan='2'style="color:red"><?php
                if(isset($rs))
                echo $rs;
                ?></td>
            </tr>
            <tr>
            <td align='center' colspan="2"><a href="dangnhap.php" style="color:#444444;">Đăng nhập</a></td>
            </tr>
        </table>
    </form>

</body>
</html>