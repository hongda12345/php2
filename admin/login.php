<?php

/**
 * @Author: 宏达
 * @Date:   2017-10-31 12:44:14
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-10-31 16:44:58
 */
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
	include'../template/admin/login.html';
}else{
    $uname=$_POST['user'];
    $upass=$_POST['pass'];
    $mysql=new mysqli('localhost','root','','villa',3306);
    $mysql->query('set names utf8');
    if($mysql->connect_errno){
    	echo 'hello world'.$mysql->connect_errno;
    	exit;
    }
    $sql="select * from admin where uname='${uname}'";
    $result=$mysql->query($sql);
    $data=$result->fetch_all(MYSQL_ASSOC);
    for($i=0;$i<count($data);$i++){
    	if($data[$i]['uname']==$uname&&$data[$i]['upass']==$upass){
    		// echo 'success';
            header('location:main.php');
    		exit;
    	}
    	// echo 'fail';
        $message='登陆失败!' ;
        $url='login.php';
        include '../template/admin/message.html';
    }
}