<?php
/* @var $dataProvider CActiveDataProvider */

echo CHtml::link('Add Patient', ['site/adminPatientsCreate'], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']);

$this->widget('zii.widgets.grid.CGridView', [
  'id' => 'patients-grid',
  'dataProvider' => $dataProvider,
  'columns' => [
    'id',
    'name',
    'address',
    'date_of_birth',
    'created_at',
    [
      'class' => 'CButtonColumn',
      'template' => '{update} {delete}',
      'buttons' => [
        'update' => [
          'label' => 'Edit',
          'url' => 'Yii::app()->createUrl("site/adminPatientsUpdate", ["id" => $data->id])',
        ],
        'delete' => [
          'label' => 'Delete',
          'url' => 'Yii::app()->createUrl("site/adminPatientsDelete", ["id" => $data->id])',
        ],
      ],
    ],
  ],
]);
