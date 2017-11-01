<?php

/**
 * @Author: 宏达
 * @Date:   2017-11-01 11:31:38
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-01 18:13:59
*/ 
header('Content-type:text/html;charset=utf8');
if($_SERVER['REQUEST_METHOD']=='GET'){
    // 显示页面 include引进页面
    include '../libs/db.php';
    include '../libs/function.php';
    $cate = new unit();
    $option=$cate->cateTable($mysql,'category');
    include '../template/admin/showCategory.html';
}else{

}