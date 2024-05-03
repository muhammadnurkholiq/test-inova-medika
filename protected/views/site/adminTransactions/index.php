<?php
/* @var $dataProvider CActiveDataProvider */

// Tombol "Add Transaction" di atas tabel
echo CHtml::link('Add Transaction', ['site/adminTransactionsCreate'], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']);

// Tampilkan `CGridView` untuk daftar `Transaction`
$this->widget('zii.widgets.grid.CGridView', [
  'id' => 'transactions-grid',
  'dataProvider' => $dataProvider,
  'columns' => [
    'id',
    'patient_id',
    'employee_id',
    'action_id',
    'medicine_id',
    'total_cost',
    'transaction_date',
    [
      'class' => 'CButtonColumn',
      'template' => '{update} {delete}',
      'buttons' => [
        'update' => [
          'label' => 'Edit',
          'url' => 'Yii::app()->createUrl("site/adminTransactionsUpdate", ["id" => $data->id])',
        ],
        'delete' => [
          'label' => 'Delete',
          'url' => 'Yii::app()->createUrl("site/adminTransactionsDelete", ["id" => $data->id])',
        ],
      ],
    ],
  ],
]);
