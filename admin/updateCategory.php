<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-01 14:36:19
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-01 18:14:13
 */
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    include '../libs/db.php';
    include '../libs/function.php';
    $cid=$_GET['cid'];
    $cate = new unit();
    $option=$cate->cateTree(0,$mysql,'category',0,$cid);
    $cname=$cate->selectOne($mysql,'category',$cid,'cname');
    include '../template/admin/updateCategory.html';
}else{
    include '../libs/db.php';
    $pid=$_POST['pid'];
    $cname=$_POST['cname'];
    $cid=$_POST['cid'];
    $sql="update category set cname='{$cname}',pid='{$pid}' where cid={$cid}";
    $mysql->query($sql);
    if($mysql->affected_rows){
        $message='栏目修改成功';
        $url='showCategory.php';
        include '../template/admin/message.html';
    }else{
        $message='栏目修改失败';
        $url='showCategory.php';
        include '../template/admin/message.html';
    }
}