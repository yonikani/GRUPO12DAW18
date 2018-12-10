<?php
$c=mysqli_connect("localhost","root","","fiestas");
$consultaguardarid=mysqli_query($c,"SELECT `idcliente` FROM `clientes` WHERE(email LIKE 'rodriguezvargasjesus@gmail.com')");
$registro=mysqli_fetch_row($consultaguardarid);
echo "$registro[0]";
?>