<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AController extends CController{
    public $layout='column1';
    public $menu=array();
    public $breadcrumbs=array();

    protected function beforeAction($action){
        // 验证是否登录
        if($action->id !== 'login' && !Yii::app()->user->id){
            $this->redirect('admin.php');
        }
        return true;
    }

    public function redirect($url, $terminate=true, $statusCode=302){
        parent::redirect($url, $terminate=true, $statusCode=302);
        Yii::app()->end();
    }

    public function performAjaxValidation($model){
        if(isset($_POST['ajax'])){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadModel($model, $id){
        $model = $model::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

}
