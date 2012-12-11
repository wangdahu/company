<div><?php echo CHtml::link(CHtml::button('新增'), $this->createUrl('create')); ?></div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'admin-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id',
        'username',
        array(
            'name' => 'level',
            'value' => 'Privilege::getAdminLevel($data->level)',
        ),
        array(
            'name' => 'logintime',
            'type' => 'datetime',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}'
        ),
    ),
));
?>
