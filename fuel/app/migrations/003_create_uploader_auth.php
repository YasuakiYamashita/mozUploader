<?php

namespace Fuel\Migrations;

class Create_uploader_auth
{
	public function up()
	{
		\DBUtil::create_table('uploader_auth', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'uploader_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'read' => array('type' => 'tinyint'),
			'upload' => array('type' => 'tinyint'),
			'admin' => array('type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
		
		
		\DBUtil::create_index('uploader_auth', array('uploader_id', 'user_id'), 'name');
	}

	public function down()
	{
		\DBUtil::drop_table('uploader_auth');
	}
}