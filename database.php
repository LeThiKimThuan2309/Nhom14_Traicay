<?php
 $severname="localhost";
 $username="root";
 $password="";
 $dbname="ql_ban_hoa_qua";
 $conn=mysqli_connect($severname,$username,$password,$dbname);

//  if(!$conn){
//      die("connection failed:".mysqli_conect_error());
//  }
//  else echo"Ket noi thanh cong!";
 mysqli_set_charset($conn,'utf8');
?>