<?php

class Medicine extends CActiveRecord
{
  public function tableName()
  {
    return 'medicines';
  }

  public function rules()
  {
    return [
      ['name, price', 'required'],
      ['name', 'length', 'max' => 255],
      ['price', 'numerical'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
      'price' => 'Price',
    ];
  }

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }
}
