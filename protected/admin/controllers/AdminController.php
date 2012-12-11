<?php
class AdminController extends AController {

    public function init(){
        $this->breadcrumbs['links']['管理员'] = $this->createUrl('index');
    }

    public function actionIndex(){
        $model=new Admin('search');
        $model->unsetAttributes();  // clear any default values

        $this->render('index',array('model'=>$model));
    }

    public function actionUpdate($id){
        $this->breadcrumbs['links'][] = '新增管理员';
        $model=$this->loadModel('Admin', $id);

        if(isset($_POST['Admin'])){
            $model->password = $model->hashPassword($model->password);
            if($model->save())
                $this->redirect(array('index'));
        }
        $model->password = '';

        $this->render('update',array('model'=>$model));
    }

    public function actionCreate(){
        $this->breadcrumbs['links'][] = '新增管理员';
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
