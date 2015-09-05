<?php
/**
 * User: lee
 * Date: 15-9-4 上午12:49
 */
function is_manage(){
    if (Session::has('manage'))
    {
        return true;
    }
    return false;
}

function unlimitedForLevel($cate, $pid = 0, $level = 0,$parent='parent_id')
{
    $arr = array();
    foreach ($cate as $k => $v) {
        if ($v[$parent] == $pid) {
            $v['level'] = $level;
            $v['mark']=str_repeat('——',$level);
            $arr[] = $v;
            $arr = array_merge($arr, unlimitedForLevel($cate, $v['id'], $level + 1,$parent));
        }
    }
    return $arr;
}