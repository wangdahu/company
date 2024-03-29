<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class WebUser extends CWebUser {

    private $_model;

    protected function loadModel($id) {
        if ($this->_model === null) {
            $this->_model = Yii::app()->db->createCommand()->from('admin')->where('id=:id', array(
                        ':id' => $id))->queryRow();
        }
        return $this->_model;
    }

    public function getLevel() {
        $model = $this->loadModel(Yii::app()->user->id);
        return $model['level'];
    }

    public function getUserName() {
        $model = $this->loadModel(Yii::app()->user->id);
        return $model['username'];
    }

}
