<?php
$this->pageTitle=Yii::app()->name . ' - 管理员登陆';
?>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableAjaxValidation'=>true, 'enableClientValidation' => true,)); ?>
<div class="login_warp">
    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('登陆'); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
</div>
