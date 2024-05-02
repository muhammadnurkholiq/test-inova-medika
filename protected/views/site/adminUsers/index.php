<?php
/* @var $dataProvider CActiveDataProvider */

echo CHtml::link('Add User', ['site/adminUsersCreate'], [
  'class' => 'btn btn-primary',
  'style' => 'margin-bottom: 10px;',
]);

$this->widget('zii.widgets.grid.CGridView', [
  'id' => 'users-grid',
  'dataProvider' => $dataProvider,
  'columns' => [
    'id',
    'username',
    'role',
    'address',
    'date_of_birth',
    'created_at',
    [
      'class' => 'CButtonColumn',
      'template' => '{update} {delete}',
      'buttons' => [
        'update' => [
          'label' => 'Edit',
          'url' => 'Yii::app()->createUrl("site/adminUsersUpdate", ["id" => $data->id])',
        ],
        'delete' => [
          'label' => 'Delete',
          'url' => 'Yii::app()->createUrl("site/adminUsersDelete", ["id" => $data->id])',
        ],
      ],
    ],
  ],
]);
