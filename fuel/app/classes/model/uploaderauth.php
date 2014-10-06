<?php

//==============================================================================
// アップローダの取得とか
//------------------------------------------------------------------------------
class Model_UploaderAuth extends Orm\Model
{
	protected static $_properties = array(
		'id',
		'uploader_id',
		'user_id',
		'read',
		'upload',
		'admin',
		'created_at',
		'updated_at',
	);
	
	protected static $_table_name = 'uploader_auth';
	protected static $_primary_key = array('id');
	
	public static function SetUploadAuth($user_id, $upload_id, $read, $upload, $admin)
	{
		$re = DB::select()->from("uploaders")->where("id", $upload_id)->execute();
		
		$read = $read? 1 : 0;
		$upload = $upload? 1 : 0;
		$admin = $admin? 1 : 0;
		
		if($admin) $read = $upload = 1;
		if($upload) $read = 1;
		
		if(count($re))
		{
			$re = DB::select()->from("uploader_auth")->where("user_id", $user_id)->and_where("uploader_id", $upload_id)->execute()->as_array();
			if(count($re))
			{
				$re = DB::update("uploader_auth")->value(array("read"=>$read, "upload"=>$upload, "admin"=>$admin))->where("id", $re[0]["id"]);
			}
			else
			{	$re = DB::insert("uploader_auth")->set(
						array(
							"user_id" => $user_id,
							"uploader_id"   => $upload_id,
							"read" => $read,
							"upload" => $upload,
							"admin" => $admin,
							"created_at" => time(),
							"updated_at" => 0
						)
					)->execute();
			}
		}
	}
}