<?php

/**
 * @Author: 宏达
 * @Date:   2017-10-31 19:49:38
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-10-31 19:55:11
 */
$mysql = new mysqli('localhost','root','','villa',3306);
$mysql->query('set names utf8');
if($mysql->connect_errno){
    //.类似于js中的+
    echo '数据库连接失败，失败信息'.$mysql->connect_errno;
    exit;
}