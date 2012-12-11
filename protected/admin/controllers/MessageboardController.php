<?php
class MessageboardController extends AController{

    public function init(){
        $this->breadcrumbs['links']['留言板'] = $this->createUrl('index');
    }

    public function actionIndex(){
        $this->render('index', array());
    }
}
