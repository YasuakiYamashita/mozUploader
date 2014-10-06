<?php 


//==============================================================================
// ユーザー認証してテンプレートを変える
//------------------------------------------------------------------------------

class Controller_BaseSignIn extends Controller_Base
{
	// ログインチェック
	public function before()
	{
		parent::before();
		
		if(!$this->login)
		{
			Session::set_flash('signin_log', "このページは認証していないと見れません");
		
			// サインインしていない場合
			Response::redirect(Uri::base(false).'signin.html');
		}
	}
}