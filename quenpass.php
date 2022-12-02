<?php
    include('database.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    function kt($email)
    {
        include('database.php');
        $query="SELECT * FROM member WHERE email='$email'";
        $query1="SELECT * FROM nguoimua WHERE email='$email'";
        $rs=mysqli_query($conn,$query);
        $rsl=mysqli_query($conn,$query1);
        if(mysqli_num_rows($rs)!=0)// member
        {
                return 1;
        }
        else
        if(mysqli_num_rows($rsl)!=0)//nguoimua 
        {
                return 0;
        }
        else
        return 2;
    }
    function ktem($email)
    {
        $em="/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        if(!preg_match($em, $email)) {
            return false;
        }
        return true;

    }
    function layuser()
    {
        include('database.php');
        $query="SELECT * FROM member";
        $rs=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($rs);
        $user=$row['username'];
        return $user ;
    }
    
    if(isset($_POST['gui']) && $_POST['email']!='')
    {
        $email=$_POST['email'];
        $matkhaumoi=rand(100,9999);
        if(ktem($email)==false)
        {
            $action="Email sai định dạng!";
        }
        else
        if(kt($email)==1)
        {
            include('database.php');
            $query="SELECT * FROM member";
            $rs=mysqli_query($conn,$query);
            $row=mysqli_fetch_array($rs);
            $user=$row['username'];
            $mk=md5($matkhaumoi);
            $sql="UPDATE member SET password='$mk' WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                $action= "Đổi thành công!";
            } else {
                $action= "Đổi thất bại!" . $conn->error;
            }
            guipass($email,$matkhaumoi,$user);
            
              
        }
        else
        if(kt($email)==0)
        {
            include('database.php');
            $query="SELECT * FROM nguoimua";
            $rs=mysqli_query($conn,$query);
            $row=mysqli_fetch_array($rs);
            $user=$row['ten_kh'];
            $mk=md5($matkhaumoi);
            $sql="UPDATE nguoimua SET password= '$mk' where email='$email'";
            guipass($email,$matkhaumoi,$user);
            if ($conn->query($sql) === TRUE) {
                $action= "Đổi thành công!";
            } else {
                $action= "Đổi thất bại!" . $conn->error;
            }
        }
        else
        if(kt($email)==2)
        {
            $action="Không có tài khoản nào được tạo từ email này!";
        }
        

        
    }
    function guipass($email,$matkhaumoi,$user)
    {
       
        require 'PHPMailer/src/POP3.php';
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        
        
        try {
        
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
        
            $mail->Username = 'wedbanhang.hehe@gmail.com';
            $mail->Password = 'ztxszdhnuyvwxuiv';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
        
            $mail->setFrom('wedbanhang.hehe@gmail.com', 'Trai Cay');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'User and password for app Ban Trai Cay ';
            $mail->Body = "Tên đăng nhập của bạn là {$user} và mật khẩu là :{$matkhaumoi}";
            $mail->send();
            
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
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
                <td align='center' colspan='2'><p align='center'><font size='5' color='#CC6600'>QUÊN MẬT KHẨU VÀ TÊN ĐĂNG NHẬP</font></p></td>
            </tr>
            <tr height='40px'>
                    <td><font size='4' color='#990000'>Email:</font></td>
                    <td><input type="text" name="email" style="height: 25px; width:  350px; border-radius: 10px;" value="<?php
                    if(isset($email))
                    echo $email;
                    ?>"required></td>
            </tr>
            <tr>
                <td align='center' colspan="2">
                    <input type="submit" name="gui" value="Gửi" style="background: #FFCCFF;border-color: #FFCCFF; border-radius: 5px; height:25px; width:90px; color:#444444;">

                </td>
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
 