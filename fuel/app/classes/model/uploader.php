<?php

//==============================================================================
// アップローダの取得とか
//------------------------------------------------------------------------------

class Model_Uploader extends Orm\Model
{
	protected static $_properties = array(
		'id',
		'charid',
		'name',
		'description',
		'userid',
		'created_at',
		'updated_at',
	);
	
	protected static $_table_name = 'uploaders';
	protected static $_primary_key = array('id');
}