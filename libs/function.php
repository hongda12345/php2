<?php

/**
 * @Author: 宏达
 * @Date:   2017-10-31 19:50:35
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-11-01 19:03:04
 */
class unit{
    function __construct(){
        $this->str='';
        $this->parentid=null;
    }
    function cateTree($pid,$db,$table,$flag,$current=null){
        $flag++;
        if($current){
            $sql="select * from $table where cid='{$current}'";
            $data = $db->query($sql)->fetch_assoc();
            $this->parentid=$data['pid'];
        }
        $sql="select * from {$table} where pid='{$pid}'";
        $data = $db->query($sql);
        while($row=$data->fetch_assoc()){
            if($row['cid']==$this->parentid){
                $this->str.="<option value={$row['cid']} selected>$flag{$row['cname']}</option>
                ";
            }else{
                 $this->str.="<option value={$row['cid']}>$flag{$row['cname']}</option>
                ";
            }
            $this->cateTree($row['cid'],$db,$table,$flag);
        }
        return $this->str;
    }
    function cateTable($db,$table){
        $sql="select * from {$table}";
        $data = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
        for($i=0;$i<count($data);$i++){
            $this->str.="
            <tr>
                <td>{$data[$i]['cid']}</td>
                <td>{$data[$i]['cname']}</td>
                <td>{$data[$i]['pid']}</td>
                <td>
                    <a href=\"deleteCategory.php?cid={$data[$i]['cid']}\" class=\"btn\">删除</a>
                    <a href=\"updateCategory.php?cid={$data[$i]['cid']}\" class=\"btn\">修改</a>
                </td>
            </tr>
            ";
        }
        return $this->str;
    }
    function selectOne($db,$table,$id,$attr){
        $sql="select $attr from $table where cid='$id'";
        $data=$db->query($sql)->fetch_assoc();
        return $data[$attr];
    }
}