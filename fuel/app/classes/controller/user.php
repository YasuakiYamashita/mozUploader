<?php

//==============================================================================
// ユーザページ
//------------------------------------------------------------------------------
class Controller_User extends Controller_Basesignin
{

	// ログインチェック
	public function before()
	{
		parent::before();
		
		$this->template->content = View::forge('user/template');
		$this->template->content->user_img  = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) ;
		$this->template->content->user_name = $this->name ;
	}

	// 最初のページ
	public function action_index($test = null)
	{
		$data = array();
		$data["user_log"] = Session::get_flash('user_log');
		$this->template->content->content =  View::forge('user/index', $data);
	}
	
	// 設定
	public function action_setting()
	{
		$data = array();
		
		if(Input::post("setting", false))
		{
			if(Input::post("old_password",false))
			if(Input::post("email",false))
			if(Auth::validate_user($this->email, Input::post("old_password",null)))
			{
				$update = array();
				$update["email"]    = Input::post("email",false);
				
				// 新パスワード入力
				if(!empty($_POST['new_password']) && !empty($_POST['new_password2']) && Input::post("new_password",false) == Input::post("new_password2",true))
				{
					$update["password"]     = Input::post("new_password",true);
					$update["old_password"] = Input::post("old_password",null);
				}
				// 新パスワードが一致していない場合
				else if(Input::post("new_password",false) || Input::post("new_password2",false))
				{
					$update = array();
					$data["setting_error"] = "new passwordが一致していません";
				}
				
				if(!empty($update))
				{
					
					// 更新処理
					if(Auth::update_user($update, $this->name))
					{
						Session::set_flash('user_log', "設定変更しました");
						Response::redirect(Uri::base(false).'user/index.html');
					}
					else
					{
						$data["setting_error"] = "更新に失敗しました";
					}
				}
			}
			else
			{
				$data["setting_error"] = "Old Password が間違っています";
			}
			
			if(empty($data["setting_error"])) $data["setting_error"] = "入力がされていないところがあります";
		}
		
		
		$data["username"] = Input::post("username", $this->name);
		$data["email"] = Input::post("email", $this->email);
		
		$this->template->content->content = View::forge('user/setting', $data);
	}
	
	// 自分のアップローダリスト
	public function action_list()
	{
		$data = array();
		$data["list"] = DB::select()->from("uploader_auth")->join("uploaders", "LEFT")->on('uploader_auth.uploader_id', "=", 'uploaders.id')->where('user_id', $this->userid[1])->execute()->as_array();
		
		$this->template->content->content = View::forge('user/list', $data);
	}

	// アップローダ作成
	public function action_create()
	{
		$data = array();
		
		if(!Auth::has_access('uploader.create'))
		{
			Session::set_flash('user_log', "新規作成の権限がありません");
			Response::redirect(Uri::base(false).'user/index.html');
		}
		
		// 送信されていた場合
		if( Input::post("create", false) )
		{
			// 入力チェック
			if( $data["name"] = Input::post("name", false) )
			if( $data["id"] = Input::post("id", false) )
			if( $data["description"] = Input::post("description", false) )
			{
				// 文字数チェック
				if(strlen($data["id"]) < 10 )
				if(strlen($data["name"]) < 50 )
				if(strlen($data["description"]) < 255 )
			
				// 登録してあるかチェック
				if(!count(DB::select()->from("uploaders")->where("charid", $data["id"])->execute()))
				{
					$re = DB::insert("uploaders")->set(
						array(
							"charid" => $data["id"],
							"name"   => $data["name"],
							"description" => $data["description"],
							"userid" => $this->userid[1],
							"created_at" => time(),
							"updated_at" => 0
						)
					)->execute();
					
					if($re)
					{
						list($insert_id, $dmy) = $re;
						Model_UploaderAuth::SetUploadAuth( $this->userid[1], $insert_id, 1, 1, 1);
					
						Session::set_flash('user_log', "新規しましたよー");
						Response::redirect(Uri::base(false).'user/index.html');
					}
					
					$data["create_error"] = "DBに登録できませんでいした";
				}
				else
				{
					$data["create_error"] = "IDが重複しています";
				}
				
				if(empty($data["create_error"])) $data["create_error"] = "文字数オーバーしています";
			}
			
			if(empty($data["create_error"])) $data["create_error"] = "入力がされていないところがあります";
		}
		
		$this->template->content->content = View::forge('user/create', $data);
	}
}
