<?php
/**
 * 权限类
 */
class Privilege{
    public static function getAdminLevel($level = null){
        $levelList =  array(
            '1' => '超级管理员',
            '2' => '普通管理员',
            '3' => '新闻发布者',
        );
        return $level ? $levelList[$level] : $levelList;
    }

    public static function getLevel(){
        return Yii::app()->user->level;
    }
}
