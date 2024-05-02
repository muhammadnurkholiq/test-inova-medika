<?php

class Action extends CActiveRecord
{
  public function tableName()
  {
    return 'actions';
  }

  public function rules()
  {
    return [
      ['name, cost', 'required'],
      ['name', 'length', 'max' => 255],
      ['cost', 'numerical'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
      'cost' => 'Cost',
    ];
  }

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }
}
