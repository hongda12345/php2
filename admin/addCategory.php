<?php

/**
 * @Author: 宏达
 * @Date:   2017-10-31 18:16:09
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-01 18:13:09
 */
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $cate = new unit();
    $option=$cate->cateTree(0,$mysql,'category',0);
    include '../template/admin/addCategory.html';
}else{
    // var_dump($_POST);
    include '../libs/db.php';
    $pid=$_POST['pid'];
    $cname=$_POST['cname'];
    $sql="insert into category (pid,cname) values ('{$pid}','{$cname}')";
    $mysql->query($sql);
    if($mysql->affected_rows){
        $message='栏目插入成功';
        $url='addCategory.php';
        include '../template/admin/message.html';
    }else{
        $message='栏目插入失败';
        $url='addCategory.php';
        include '../template/admin/message.html';
    }
}