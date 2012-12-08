<?php
class IndexController extends AController {

    public $defaultAction = 'login';
    public $layout = 'column1';

    public function actionIndex(){
        //
        echo "<pre>"; var_dump(Yii::app()->user->id);
        echo 1;
    }

    public function actionLogin(){
        $model=new LoginForm;
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm'])){
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()){
                $this->redirect(array('/admin'));
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(array('login'));
    }

}
?>
