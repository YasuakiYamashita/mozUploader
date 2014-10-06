<?php

//==============================================================================
// アップローダ中心部
//------------------------------------------------------------------------------
class Controller_Index extends Controller_Base
{

	// 最初のページ
	public function action_index()
	{
		$this->template->content = View::forge('index/index');
		$this->template->header = View::forge('index/header');
	}
	
	// 404の場合
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
	
	// ログインページ
	public function action_signin()
	{
		$data = array();
		
		// ログインされていた場合
		if($this->login)
		{
			Response::redirect(Uri::base(false).'user/index.html');
		}
		
		// 送信されていた場合
		if (Input::post('signin', false))
		{
			// Authのインスタンス化
			$auth = Auth::instance();
			// 資格情報の確認
			if ($auth->login($_POST['username'],$_POST['password']))
			{
				// 認証OKならトップページへ
				Response::redirect(Uri::base(false).'user/index.html');
				
				if(Input::post('remember', false))
				{
					// ログイン情報を記憶しておく
					\Auth::remember_me();
				}
			}
			else
			{
				//認証が失敗したときの処理
				$data['username'] = $_POST['username'];
				$data['signin_error'] = "ユーザー名かパスワードが違います。再入力して下さい。";
			}
		}
		
		else
		{
			// 文字表示
			$data['signin_log'] = Session::get_flash('signin_log');
		}
		
		// ログインフォームの表示
		$this->template->content = View::forge('signin', $data);
	}

	// サインアウト処理
	public function action_signout()
	{
		// ログインしていたら
		if($this->login)
		{
			// ログアウト処理
			Auth::logout();
			
			// ログアウトしましたよ
			Session::set_flash('signin_log', "ログアウトしましたよー");
		}
		
		// サインインページに飛ぶ
		Response::redirect(Uri::base(false).'signin.html');
	}
	
	
	// ユーザ追加
	public function action_signup()
	{
		$data = array();
		
		// ログインされていた場合
		if($this->login)
		{
			Response::redirect(Uri::base(false).'user/index.html');
		}
		
		// 送信されていた場合
		if (Input::post('signup', false))
		{
			// パスワードの入力があっていた場合
			if(Input::post('password', false) == Input::post('password2', true))
			{
				if(Input::post('username', false))
				{
					if(Input::post('email', false))
					{
						// admin pass Cherck
						if(Input::post('adminpass', false) == "0816")
						{
							// 新しいユーザーを作成
							$re = Auth::create_user(
								Input::post('username', false),
								Input::post('password', false),
								Input::post('email', false),
								1,
					 			array()
					 		);
					 		
					 		if( $re !== false )
					 		{
								Session::set_flash('signin_log', "ユーザ登録しました");
								Response::redirect(Uri::base(false).'signin.html');
					 		}
					 		else
					 		{
								$data['signup_error'] = "登録が失敗しました";
					 		}
						}
						else
						{
							$data['signup_error'] = "AdminPassが間違っています";
						}
					}
				}
			}
			
			if(empty($data['signup_error']))
				$data['signup_error'] = "入力内容に間違いがあります";
		}
		
		// サインアップフォームの表示
		$this->template->content = View::forge('signup', $data);
	}
	
}
