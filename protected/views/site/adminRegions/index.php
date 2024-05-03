<?php
/* @var $dataProvider CActiveDataProvider */

echo CHtml::link('Add Region', ['site/adminRegionsCreate'], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']);

$this->widget('zii.widgets.grid.CGridView', [
  'id' => 'regions-grid',
  'dataProvider' => $dataProvider,
  'columns' => [
    'id',
    'name',
    [
      'class' => 'CButtonColumn',
      'template' => '{update} {delete}',
      'buttons' => [
        'update' => [
          'label' => 'Edit',
          'url' => 'Yii::app()->createUrl("site/adminRegionsUpdate", ["id" => $data->id])',
        ],
        'delete' => [
          'label' => 'Delete',
          'url' => 'Yii::app()->createUrl("site/adminRegionsDelete", ["id" => $data->id])',
        ],
      ],
    ],
  ],
]);
