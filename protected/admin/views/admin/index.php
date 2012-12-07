<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'admin-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id',
        'username',
        array(
            'name' => 'level',
            'value' => 'Admin::getAdminLevel($data->level)',
        ),
        'logintime',
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}'
        ),
    ),
));
?>
