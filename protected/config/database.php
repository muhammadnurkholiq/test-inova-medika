<?php

// This is the database connection configuration.
return array(
	'class' => 'CDbConnection',
	'connectionString' => 'pgsql:host=localhost;port=5432;dbname=nama-database',
	'username' => 'username',
	'password' => 'password',
	'charset' => 'utf8',
	'emulatePrepare' => true
);
