<?php

class Region extends CActiveRecord
{
  public function tableName()
  {
    return 'regions';
  }

  public function rules()
  {
    return [
      ['name', 'required'],
      ['name', 'length', 'max' => 255],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
    ];
  }

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }
}
