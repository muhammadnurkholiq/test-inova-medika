<?php

class Patient extends CActiveRecord
{
  public function tableName()
  {
    return 'patients';
  }

  public function rules()
  {
    return [
      ['name, date_of_birth', 'required'],
      ['name, address', 'length', 'max' => 255],
      ['date_of_birth', 'date', 'format' => 'yyyy-MM-dd'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
      'address' => 'Address',
      'date_of_birth' => 'Date of Birth',
      'created_at' => 'Created At',
    ];
  }

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }
}
