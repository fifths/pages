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
