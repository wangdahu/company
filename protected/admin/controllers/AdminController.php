<?php
class AdminController extends AController {

    public $layout = 'main';

    public function init(){
        $this->breadcrumbs=array('links' => array('首页' => Yii::app()->createUrl('index')));
        $this->breadcrumbs = array_push($this->breadcrumbs['links'], array('管理员' => $this->createUrl('index')));
        echo "<pre>"; var_dump($this->breadcrumbs);exit;
    }

    public function actionIndex(){
        $model=new Admin('search');
        $model->unsetAttributes();  // clear any default values

        $this->render('index',array('model'=>$model));
    }

    public function actionUpdate($id){
        $this->layout = '/main';
        $model=$this->loadModel('Admin', $id);
        // Uncomment the following line if AJAX validation is needed

        if(isset($_POST['Admin'])){
            $model->password = $model->hashPassword($model->password);
            if($model->save())
                $this->redirect(array('index'));
        }
        $model->password = '';

        $this->render('update',array('model'=>$model));
    }

    public function actionCreate(){
        echo "<pre>"; var_dump($this->breadcrumbs);exit;
        $model = new Admin;
        $this->performAjaxValidation($model);

        if(isset($_POST['Admin'])){
            $model->attributes = $_POST['Admin'];
            $model->password = $model->hashPassword($model->password);
            $model->logintime = time();
            if($model->save())
                $this->redirect(array('index'));
        }

        $this->render('create',array('model'=>$model));
    }
}
?>
