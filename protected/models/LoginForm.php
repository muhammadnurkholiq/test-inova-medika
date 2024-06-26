<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;

	private $_identity;

	public function rules()
	{
		return [
			['username, password', 'required'],
			['password', 'authenticate'],
		];
	}

	public function authenticate($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$this->_identity = new UserIdentity($this->username, $this->password);
			if (!$this->_identity->authenticate()) {
				$this->addError('password', 'Invalid username or password.');
			}
		}
	}

	public function login()
	{
		if ($this->_identity === null) {
			$this->_identity = new UserIdentity($this->username, $this->password);
			$this->_identity->authenticate();
		}

		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			Yii::app()->user->login($this->_identity);
			return true;
		}

		return false;
	}
}
