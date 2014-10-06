<?php

namespace Fuel\Migrations;

class Create_uploaders
{
	public function up()
	{
		\DBUtil::create_table('uploaders', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'charid' => array('constraint' => 10, 'type' => 'varchar'),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'userid' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
		
		\DBUtil::create_index('uploaders', array('charid', 'name', 'userid'), 'name');
	}

	public function down()
	{
		\DBUtil::drop_table('uploaders');
	}
}