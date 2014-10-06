<?php 


//==============================================================================
// ���[�U�[�F�؂��ăe���v���[�g��ς���
//------------------------------------------------------------------------------

class Controller_Base extends Controller_Template
{
	// ���O�C���`�F�b�N
	public function before()
	{
		parent::before();
		
		// �T�C���C�����Ă��邩�`�F�b�N
		$this->login = Auth::check();
		
		// ���O�C�����Ă����ꍇ
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