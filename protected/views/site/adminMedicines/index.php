<?php
/* @var $dataProvider CActiveDataProvider */

echo CHtml::link('Add Medicine', ['site/adminMedicinesCreate'], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']);

$this->widget('zii.widgets.grid.CGridView', [
  'id' => 'medicines-grid',
  'dataProvider' => $dataProvider,
  'columns' => [
    'id',
    'name',
    'price',
    [
      'class' => 'CButtonColumn',
      'template' => '{update} {delete}',
      'buttons' => [
        'update' => [
          'label' => 'Edit',
          'url' => 'Yii::app()->createUrl("site/adminMedicinesUpdate", ["id" => $data->id])',
        ],
        'delete' => [
          'label' => 'Delete',
          'url' => 'Yii::app()->createUrl("site/adminMedicinesDelete", ["id" => $data->id])',
        ],
      ],
    ],
  ],
]);
