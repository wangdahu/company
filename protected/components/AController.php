<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AController extends Controller{
    public $layout='main';
    public $menu=array();
    public $breadcrumbs=array();

    protected function beforeAction($action){
        Yii::app()->setHomeUrl($this->createUrl('/index/index'));
        // 验证是否登录
        if($action->id !== 'login' && !Yii::app()->user->id){
            $this->redirect('admin.php');
        }
        return true;
    }

}
