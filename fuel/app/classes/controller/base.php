<?php 


//==============================================================================
// ユーザー認証してテンプレートを変える
//------------------------------------------------------------------------------

class Controller_Base extends Controller_Template
{
	// ログインチェック
	public function before()
	{
		parent::before();
		
		// サインインしているかチェック
		$this->login = Auth::check();
		
		// ログインしていた場合
		if($this->login)
		{
			$data = array('user' => array());
			
			$data['user']['name']   = $this->name   = Auth::get_screen_name();
			$data['user']['email']  = $this->email  = Auth::get_email();
			$data['user']['userid'] = $this->userid = Auth::get_user_id();
			
			$this->template->nav = View::forge('template/nav_signin', $data);
		}
		else
		{
			$this->template->nav = View::forge('template/nav_signout');
		}
	}
}