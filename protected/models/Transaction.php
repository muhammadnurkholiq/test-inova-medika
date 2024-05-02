<?php

class Transaction extends CActiveRecord
{
  public function tableName()
  {
    return 'transactions';
  }

  public function rules()
  {
    return [
      ['patient_id, employee_id, action_id, medicine_id', 'required'],
      ['total_cost', 'numerical'],
      ['patient_id, employee_id, action_id, medicine_id', 'numerical', 'integerOnly' => true],
      ['transaction_date', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'patient_id' => 'Patient ID',
      'employee_id' => 'Employee ID',
      'action_id' => 'Action ID',
      'medicine_id' => 'Medicine ID',
      'total_cost' => 'Total Cost',
      'transaction_date' => 'Transaction Date',
    ];
  }

  public function relations()
  {
    return [
      'patient' => [self::BELONGS_TO, 'Patient', 'patient_id'],
      'employee' => [self::BELONGS_TO, 'Employee', 'employee_id'],
      'action' => [self::BELONGS_TO, 'Action', 'action_id'],
      'medicine' => [self::BELONGS_TO, 'Medicine', 'medicine_id'],
    ];
  }

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }
}
