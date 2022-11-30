<?php
    include('database.php');
    
    session_start();
    if(isset($_SESSION['username']))
    {
        
        if(isset($_POST['gui']) && $_POST['pass']!=''&& $_POST['passnew']!='')
        {
            $a=$_SESSION['username'];
            $p=$_SESSION['passw'];
            $old=$_POST['pass'];
            $new=$_POST['passnew'];
            $mk=md5($new);
            $mkc=md5($old);
            if($p==$mkc)
            {
                $sql="UPDATE nguoimua SET password='$mk' where ten_kh='$a'";
                if ($conn->query($sql) === TRUE) {
                    $action= "Đổi thành công!";
                } else {
                    $action= "Đổi thất bại!" . $conn->error;
                }
            }
            else
            $action="Mật khẩu cũ bạn nhập vào không đúng!";
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
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
                <td align='center' colspan='2'><p align='center'><font size='5' color='#CC6600'>THAY ĐỔI MẬT KHẨU</font></p></td>
            </tr>
            <tr height='40px'>
                    <td><font size='4' color='#990000'>Mật khẩu cũ:</font></td>
                    <td><input type="password" name="pass" style="height: 25px; width:  350px; border-radius: 10px;" value="<?php
                    if(isset($email))
                    echo $email;
                    ?>"required></td>
            </tr>
            <tr height='40px'>
                    <td><font size='4' color='#990000'>Mật khẩu mới:</font></td>
                    <td><input type="password" name="passnew" style="height: 25px; width:  350px; border-radius: 10px;" value="<?php
                    if(isset($email))
                    echo $email;
                    ?>"required></td>
            </tr>
            <tr>
                <td align='center' colspan="2">
                    <input type="submit" name="gui" value="Đổi" style="background: #FFCCFF;border-color: #FFCCFF; border-radius: 5px; height:25px; width:90px; color:#444444;">

                </td>
            </tr>
            <tr>
            <td align='center' colspan="2"><a href="Trangchu.php" style="color:#444444;">Trang chủ</a></td>
            </tr>
            <tr>
                
                <td align='center'colspan='2'style="color:red"><?php
                if(isset($action))
                echo $action;
                ?></td>
            </tr>
    </form>
</body>
</html>