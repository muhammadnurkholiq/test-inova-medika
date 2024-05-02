<?php

class m240502_203943_create_table_users extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', [
			'id' => 'pk',
			'username' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'role' => 'string NOT NULL',
			'address' => 'string',
			'date_of_birth' => 'date',
			'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP'
		]);

		$this->insert(
			'users',
			[
				'username' => 'admin',
				'password' => md5('pass'),
				'role' => 'admin',
				'address' => 'Bandung',
				'date_of_birth' => '2001-04-11',
				'created_at' => date('Y-m-d H:i:s')
			],
		);
		$this->insert(
			'users',
			[
				'username' => 'employee',
				'password' => md5('pass'),
				'role' => 'employee',
				'address' => 'Bandung',
				'date_of_birth' => '2001-04-11',
				'created_at' => date('Y-m-d H:i:s')
			]
		);
		$this->insert(
			'users',
			[
				'username' => 'patient',
				'password' => md5('pass'),
				'role' => 'patient',
				'address' => 'Bandung',
				'date_of_birth' => '2001-04-11',
				'created_at' => date('Y-m-d H:i:s')
			],
		);
	}

	public function down()
	{
		$this->dropTable('users');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
