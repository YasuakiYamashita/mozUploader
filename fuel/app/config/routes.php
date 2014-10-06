<?php
return array(
	'_root_'	=> 'index/index',  // The default route
	'_404_'		=> 'index/404',    // The main 404 route
	'signin'	=> 'index/signin',
	'signup'	=> 'index/signup',
	'signout'	=> 'index/signout',
	'page/(:segment)/(:segment)'=>'page/$2/$1',
	'page/(:segment)'=>'page/index/$1',
	
);