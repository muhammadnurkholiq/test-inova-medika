<?php

class m240502_203944_create_table_patients extends CDbMigration
{
	public function up()
	{
		$this->createTable('patients', [
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'address' => 'string',
			'date_of_birth' => 'date',
			'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		]);

		$this->insert('patients', [
			'name' => 'Patient 1',
			'address' => '456 Side St',
			'date_of_birth' => '1990-01-01',
		]);
	}

	public function down()
	{
		$this->dropTable('patients');
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
