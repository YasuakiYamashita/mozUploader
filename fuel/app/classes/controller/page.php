<?php

//==============================================================================
// アップローダページ
//------------------------------------------------------------------------------
class Controller_Page extends Controller_Basesignin
{

	// ログインチェック
	public function before()
	{
		parent::before();
		
		$this->charid = Uri::segment(2);
		
		$this->template->content = View::forge('page/template');
		$this->template->content->user_img  = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) ;
		$this->template->content->user_name = $this->name ;
		$this->template->content->charid    = $this->charid ;
		
		$re = DB::select()->from("uploaders")->where("charid", $this->charid)->execute()->as_array();
		
		if(!count($re))
		{
			throw new HttpNotFoundException;
		}
		
		$this->template->content->uploader = $this->uploader = $re[0];
		
	}
	
	public function action_index()
	{
	
	}
	
	
	public function action_setting()
	{
	
	}
}
