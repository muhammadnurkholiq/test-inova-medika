<?php

class m240502_204140_create_table_actions extends CDbMigration
{
	public function up()
	{
		$this->createTable('actions', [
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'cost' => 'numeric',
		]);

		$this->insert('actions', [
			'name' => 'Action 1',
			'cost' => 100000,
		]);
	}

	public function down()
	{
		$this->dropTable('actions');
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
