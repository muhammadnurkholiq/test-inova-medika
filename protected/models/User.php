<?php

class User extends CActiveRecord
{
  public function tableName()
  {
    return 'users';
  }

  public function rules()
  {
    return [
      ['username, password, role, address, date_of_birth', 'required'],
      ['username, password', 'length', 'max' => 128],
      ['address', 'length', 'max' => 255],
      ['role', 'in', 'range' => ['admin', 'employee']],
      ['date_of_birth', 'date', 'format' => 'yyyy-MM-dd'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'username' => 'Username',
      'password' => 'Password',
      'role' => 'Role',
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
