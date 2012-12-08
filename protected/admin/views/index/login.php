<?php
$this->pageTitle=Yii::app()->name . ' - 管理员登陆';
?>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableAjaxValidation'=>true,)); ?>
    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'username'); ?>
        </div>
        <div class="textField">
            <?php echo $form->textField($model, 'username'); ?>
        </div>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'password'); ?>
        </div>
        <div class="textField">
            <?php echo $form->textField($model, 'password'); ?>
        </div>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row submit">
        <div class="buttons">
            <?php echo CHtml::submitButton('登陆'); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>
</div>
