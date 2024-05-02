<?php

class m240502_204208_create_table_transactions extends CDbMigration
{
	public function up()
	{
		$this->createTable('transactions', [
			'id' => 'pk',
			'patient_id' => 'integer REFERENCES patients(id)',
			'employee_id' => 'integer REFERENCES users(id)',
			'action_id' => 'integer REFERENCES actions(id)',
			'medicine_id' => 'integer REFERENCES medicines(id)',
			'total_cost' => 'numeric',
			'transaction_date' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
		]);

		$this->insert('transactions', [
			'patient_id' => 1,
			'employee_id' => 2,
			'action_id' => 1,
			'medicine_id' => 1,
			'total_cost' => 150000,
			'transaction_date' => date('Y-m-d H:i:s'),
		]);
	}

	public function down()
	{
		$this->dropTable('transactions');
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
