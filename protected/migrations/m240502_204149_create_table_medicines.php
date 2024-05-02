<?php

class m240502_204149_create_table_medicines extends CDbMigration
{
	public function up()
	{
		$this->createTable('medicines', [
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'price' => 'numeric',
		]);

		$this->insert('medicines', [
			'name' => 'Medicine 1',
			'price' => 50000,
		]);
	}

	public function down()
	{
		$this->dropTable('medicines');
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
