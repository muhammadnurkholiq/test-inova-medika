<?php
/* @var $dataProvider CActiveDataProvider */

echo CHtml::link('Add Action', ['site/adminActionsCreate'], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']);

$this->widget('zii.widgets.grid.CGridView', [
  'id' => 'actions-grid',
  'dataProvider' => $dataProvider,
  'columns' => [
    'id',
    'name',
    'cost',
    [
      'class' => 'CButtonColumn',
      'template' => '{update} {delete}',
      'buttons' => [
        'update' => [
          'label' => 'Edit',
          'url' => 'Yii::app()->createUrl("site/adminActionsUpdate", ["id" => $data->id])',
        ],
        'delete' => [
          'label' => 'Delete',
          'url' => 'Yii::app()->createUrl("site/adminActionsDelete", ["id" => $data->id])',
        ],
      ],
    ],
  ],
]);
