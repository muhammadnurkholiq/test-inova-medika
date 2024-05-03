<?php

class SiteController extends Controller
{
	/**
	 * Class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * Default 'index' action.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * Handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			} else {
				$this->render('error', $error);
			}
		}
	}

	// auth 
	// login
	public function actionLogin()
	{
		$model = new LoginForm;

		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login()) {
				$role = Yii::app()->user->role;
				if ($role === 'admin') {
					$this->redirect(['site/adminUsers/index']);
				} elseif ($role === 'employee') {
					$this->redirect(['index']);
				}
			} else {
				Yii::app()->user->setFlash('error', 'Login failed.');
			}
		}

		$this->render('login', ['model' => $model]);
	}
	// logout
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	// Admin-users
	public function actionAdminUsers()
	{
		$dataProvider = new CActiveDataProvider('User');
		$this->render('adminUsers/index', ['dataProvider' => $dataProvider]);
	}

	public function actionAdminUsersCreate()
	{
		$model = new User;

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'User created successfully.');
				$this->redirect(['site/adminUsers/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to create user.');
			}
		}

		$this->render('adminUsers/create', ['model' => $model]);
	}

	public function actionAdminUsersUpdate($id)
	{
		$model = User::model()->findByPk($id);

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];

			if (!empty($model->password)) {
				$model->password = md5($model->password);
			} else {
				$model->password = User::model()->findByPk($id)->password;
			}

			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'User updated successfully.');
				$this->redirect(['site/adminUsers/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to update user.');
			}
		}

		$this->render('adminUsers/update', ['model' => $model]);
	}

	public function actionAdminUsersDelete($id)
	{
		if ($id == 1) {
			Yii::app()->user->setFlash('error', 'Admin user with ID 1 cannot be deleted.');
		} else {
			$model = User::model()->findByPk($id);
			if ($model->delete()) {
				Yii::app()->user->setFlash('success', 'User deleted successfully.');
			} else {
				Yii::app()->user->setFlash('error', 'Failed to delete user.');
			}
		}
		$this->redirect(['site/adminUsers/index']);
	}

	// Admin-regions
	public function actionAdminRegions()
	{
		$dataProvider = new CActiveDataProvider('Region');
		$this->render('adminRegions/index', ['dataProvider' => $dataProvider]);
	}

	public function actionAdminRegionsCreate()
	{
		$model = new Region;

		if (isset($_POST['Region'])) {
			$model->attributes = $_POST['Region'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Region created successfully.');
				$this->redirect(['site/adminRegions/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to create region.');
			}
		}

		$this->render('adminRegions/create', ['model' => $model]);
	}

	public function actionAdminRegionsUpdate($id)
	{
		$model = Region::model()->findByPk($id);

		if (isset($_POST['Region'])) {
			$model->attributes = $_POST['Region'];

			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Region updated successfully.');
				$this->redirect(['site/adminRegions/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to update region.');
			}
		}

		$this->render('adminRegions/update', ['model' => $model]);
	}

	public function actionAdminRegionsDelete($id)
	{
		if ($id == 1) {
			Yii::app()->user->setFlash('error', 'Admin region with ID 1 cannot be deleted.');
		} else {
			$model = Region::model()->findByPk($id);
			if ($model->delete()) {
				Yii::app()->user->setFlash('success', 'Region deleted successfully.');
			} else {
				Yii::app()->user->setFlash('error', 'Failed to delete region.');
			}
		}
		$this->redirect(['site/adminRegions/index']);
	}

	// Admin-actions
	public function actionAdminActions()
	{
		$dataProvider = new CActiveDataProvider('Action');
		$this->render('adminActions/index', ['dataProvider' => $dataProvider]);
	}

	public function actionAdminActionsCreate()
	{
		$model = new Action;

		if (isset($_POST['Action'])) {
			$model->attributes = $_POST['Action'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Action created successfully.');
				$this->redirect(['site/adminActions/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to create action.');
			}
		}

		$this->render('adminActions/create', ['model' => $model]);
	}

	public function actionAdminActionsUpdate($id)
	{
		$model = Action::model()->findByPk($id);

		if (isset($_POST['Action'])) {
			$model->attributes = $_POST['Action'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Action updated successfully.');
				$this->redirect(['site/adminActions/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to update action.');
			}
		}

		$this->render('adminActions/update', ['model' => $model]);
	}

	public function actionAdminActionsDelete($id)
	{
		$model = Action::model()->findByPk($id);
		if ($model->delete()) {
			Yii::app()->user->setFlash('success', 'Action deleted successfully.');
		} else {
			Yii::app()->user->setFlash('error', 'Failed to delete action.');
		}
		$this->redirect(['site/adminActions/index']);
	}

	// Admin-patient
	public function actionAdminPatients()
	{
		$dataProvider = new CActiveDataProvider('Patient');
		$this->render('AdminPatients/index', ['dataProvider' => $dataProvider]);
	}

	public function actionAdminPatientsCreate()
	{
		$model = new Patient;

		if (isset($_POST['Patient'])) {
			$model->attributes = $_POST['Patient'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Patient created successfully.');
				$this->redirect(['site/AdminPatients/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to create patient.');
			}
		}

		$this->render('AdminPatients/create', ['model' => $model]);
	}

	public function actionAdminPatientsUpdate($id)
	{
		$model = Patient::model()->findByPk($id);

		if (isset($_POST['Patient'])) {
			$model->attributes = $_POST['Patient'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Patient updated successfully.');
				$this->redirect(['site/AdminPatients/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to update patient.');
			}
		}

		$this->render('AdminPatients/update', ['model' => $model]);
	}

	public function actionAdminPatientsDelete($id)
	{
		$model = Patient::model()->findByPk($id);
		if ($model->delete()) {
			Yii::app()->user->setFlash('success', 'Patient deleted successfully.');
		} else {
			Yii::app()->user->setFlash('error', 'Failed to delete patient.');
		}
		$this->redirect(['site/AdminPatients/index']);
	}

	// Admin-medicines
	public function actionAdminMedicines()
	{
		$dataProvider = new CActiveDataProvider('Medicine');
		$this->render('AdminMedicines/index', ['dataProvider' => $dataProvider]);
	}

	public function actionAdminMedicinesCreate()
	{
		$model = new Medicine;

		if (isset($_POST['Medicine'])) {
			$model->attributes = $_POST['Medicine'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Medicine created successfully.');
				$this->redirect(['site/AdminMedicines/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to create medicine.');
			}
		}

		$this->render('AdminMedicines/create', ['model' => $model]);
	}

	public function actionAdminMedicinesUpdate($id)
	{
		$model = Medicine::model()->findByPk($id);;

		if (isset($_POST['Medicine'])) {
			$model->attributes = $_POST['Medicine'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Medicine updated successfully.');
				$this->redirect(['site/AdminMedicines/index']);
			} else {
				Yii::app()->user->setFlash('error', 'Failed to update medicine.');
			}
		}

		$this->render('AdminMedicines/update', ['model' => $model]);
	}

	public function actionAdminMedicinesDelete($id)
	{
		$model = Medicine::model()->findByPk($id);;
		if ($model->delete()) {
			Yii::app()->user->setFlash('success', 'Medicine deleted successfully.');
		} else {
			Yii::app()->user->setFlash('error', 'Failed to delete medicine.');
		}
		$this->redirect(['site/AdminMedicines/index']);
	}
}
