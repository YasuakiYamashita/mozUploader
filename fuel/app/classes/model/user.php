<?php

//==============================================================================
// ƒ†[ƒUî•ñŽæ“¾
//------------------------------------------------------------------------------
class Model_User extends Orm\Model
{
	protected static $_properties = array(
		'id',
		'username', 
		'group',
		'email',
	);
	protected static $_table_name = 'users';
	protected static $_primary_key = array('id');
	
	public function UserImg()
	{
		return "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) ;
	}
}