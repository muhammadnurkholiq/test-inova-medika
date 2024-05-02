<?php

class m240502_204124_create_table_regions extends CDbMigration
{
	public function up()
	{
		$this->createTable('regions', [
			'id' => 'pk',
			'name' => 'string NOT NULL',
		]);

		$this->insert('regions', ['name' => 'Region 1']);
	}

	public function down()
	{
		$this->dropTable('regions');
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
