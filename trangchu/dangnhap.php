<?php
    session_start();
    include("../sql/config.php");
    function testus($user,$pass)
    {
        include("../sql/config.php");
        $query="SELECT * FROM member WHERE username='$user'";
        $query1="SELECT * FROM nguoimua WHERE ten_kh='$user'";
        $rs=mysqli_query($conn,$query);
        $rsl=mysqli_query($conn,$query1);

        if(mysqli_num_rows($rs)!=0)// member
        {
            $query="SELECT * FROM member ";
            $rs=mysqli_query($conn,$query);
            $row=mysqli_fetch_array($rs);
            if($pass==$row['password'])//member 1
            {
                
                return 1;
            }
            else
            return 2;
           
        }
        else
        if(mysqli_num_rows($rsl)!=0)//nguoimua 0
        {
            $query="SELECT * FROM nguoimua ";
            $rs=mysqli_query($conn,$query);
            $row=mysqli_fetch_array($rs);
            if($pass==$row['password'])
            {
            
                return 0;
            
            }
            else
            return 2;
        }
        else
        return 3;

       
    }
   
    // //member =1 kh=0 saimk=2 sai name=3
    if(isset($_POST['dangnhap']) && $_POST['usename']!='' && $_POST['passw']!='')
    {
        $user=$_POST['usename'];
        $pass=$_POST['passw'];
        $password=md5($pass);
        if(testus($user,$password)==1)
        {
            header('Location:./header.php');
            $_SESSION['username']=$user;
            $_SESSION['passw']=$password;
        }
        else
        if(testus($user,$password)==0)
        
        {
            header('Location:./header.php');
            $_SESSION['username']=$user;
            $_SESSION['passw']=$password;
        }
        else
        if(testus($user,$password)==3)
        {
            $action="Tên tài khoản chưa tồn tại!";
        }
        else
        if(testus($user,$password)==2)
        {
            $action="Nhập sai mật khẩu!";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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

    <form action="dangnhap.php?do=login" method="post">
        <table align='center'>
            <tr>
                <td align='center' colspan='2'><p align='center'><font size='7' color='#CC6600'>Đăng nhập</font></p></td>
            </tr>
            <tr height='40px'>
                <td><font size='4' color='#990000'>Tên đăng nhập:</font></td>
                <td><input type="text" name="usename" style="height: 25px; width:  300px; border-radius: 10px;"required></td>
            </tr>
            <tr height='40px'>
                <td><font size='4' color='#990000'>Mật khẩu:</font></td>
                <td><input type="password" name="passw" style="height: 25px; width:  300px; border-radius: 10px;"required></td>
            </tr>
            <tr>
                <td align='center' colspan='2'>
                    <input type="submit" name="dangnhap" value="Đăng nhập" style="background: #FFCCFF;border-color: #FFCCFF; border-radius: 5px; height:25px; width:90px; color:#444444;">

                </td>
            </tr>
            <tr>
            <td align='center' colspan="2"><a href="dangki_kh.php" style="color:#444444;">Đăng ký</a></td>
            </tr>
            <tr>
            <td align='center' colspan="2"><a href="quenpass.php" style="color:#444444;"><font size='2' color='#990000'>Quên mật khẩu</font></a></td>
            </tr>
            <tr>
                
                <td align='center'colspan='2'style="color:red"><?php
                if(isset($action))
                echo $action;
                ?></td>
            </tr>
        </table>
    </form>
</body>
</html>