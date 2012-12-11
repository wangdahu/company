<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $layout='column1';
	public $menu=array();
	public $breadcrumbs=array();

    public function loadModel($model, $id){
		$model = $model::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    public function performAjaxValidation($model){
		if(isset($_POST['ajax'])){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function redirect($url, $terminate=true, $statusCode=302){
        parent::redirect($url, $terminate=true, $statusCode=302);
        Yii::app()->end();
    }

}
