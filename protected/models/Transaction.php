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
      ['patient_id, employee_id, action_id, medicine_id, total_cost', 'required'],
      ['patient_id', 'validatePatientId'],
      ['employee_id', 'validateEmployeeId'],
      ['action_id', 'validateActionId'],
      ['medicine_id', 'validateMedicineId'],
      ['total_cost', 'numerical', 'min' => 0],
    ];
  }

  public function validatePatientId($attribute, $params)
  {
    $patient = Patient::model()->findByPk($this->$attribute);
    if (!$patient) {
      $this->addError($attribute, 'Invalid Patient ID.');
    }
  }

  public function validateEmployeeId($attribute, $params)
  {
    $employee = User::model()->findByPk($this->$attribute);
    if (!$employee || $employee->role !== 'employee') {
      $this->addError($attribute, 'Invalid Employee ID.');
    }
  }

  public function validateActionId($attribute, $params)
  {
    $action = Action::model()->findByPk($this->$attribute);
    if (!$action) {
      $this->addError($attribute, 'Invalid Action ID.');
    }
  }

  public function validateMedicineId($attribute, $params)
  {
    $medicine = Medicine::model()->findByPk($this->$attribute);
    if (!$medicine) {
      $this->addError($attribute, 'Invalid Medicine ID.');
    }
  }

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }
}
