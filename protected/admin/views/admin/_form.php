<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'admin-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'username'); ?>
        </div>
        <div class="textField">
            <?php if($model->isNewRecord): ?>
            <?php echo $form->textField($model, 'username'); ?>
            <?php else: ?>
            <strong><?php echo $model->username; ?></strong>
            <?php endif;?>
        </div>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'oldpassword'); ?>
        </div>
        <div class="textField">
            <?php echo $form->textField($model, 'password'); ?>
        </div>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <?php if(!$model->isNewRecord): ?>
    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'newpassword'); ?>
        </div>
        <div class="textField">
            <?php echo $form->textField($model, 'password'); ?>
        </div>
        <?php echo $form->error($model, 'newpassword'); ?>
    </div>

    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'repeatpassword'); ?>
        </div>
        <div class="textField">
            <?php echo $form->textField($model, 'password'); ?>
        </div>
        <?php echo $form->error($model, 'repeatpassword'); ?>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'level'); ?>
        </div>
        <div class="textField">
            <?php echo $form->dropdownList($model, 'level', Privilege::getAdminLevel()); ?>
        </div>
        <?php echo $form->error($model, 'level'); ?>
    </div>

    <?php if(!$model->isNewRecord): ?>
    <div class="row">
        <div class="labelField">
            <?php echo $form->labelEx($model, 'logintime'); ?>
        </div>
        <div class="textField">
            <?php echo date('Y-m-d H:i', $model->logintime); ?>
        </div>
    </div>
    <?php endif;?>

    <div class="row">
        <div class="buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? '新增' : '保存', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
