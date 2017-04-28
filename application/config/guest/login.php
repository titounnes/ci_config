<?php defined('BASEPATH') OR exit('No direct script access allowed');


$config['confirmation'] = 
[
	'argument' => [
		'select' => 'id,email,password',
		'table' => 'user',
		'where' => [
			'id'=>'id|data',
		]
	],
	'html' => [
		'anchor' => [
			'login' => [
				'action' => 'guest/form/login/',
				'label' => 'Login',
			],
		],
		'notif' => 'success',
		'title' => 'Konfirmasi Login',
		'message' => '<p>Login Berhasil</p>',
	],
];

$config['form'] = 
[
	'argument' => [
		'select' => 'id,email,password',
		'table' => 'user',
	],
	'form' => [
		'title' => 'Login Pengguna',
		'anchor' => [
			'back' => [
				'action' => '',
				'label' => 'Home',
			],
			'submit' => [
				'action' => 'guest/auth/login',
				'label' => 'Login',
			],
			'forgot' => [
				'action' => 'guest/form/forgot',
				'label' => 'Lupa Password',
			]
		],
		'html' => [
			'email' => [
				'type' => 'email',
				'place-holder' => 'Email valid',
				'label' => 'Email',
			],
			'password' => [
				'type' => 'password',
				'label' => 'Password',
				'place-holder' => 'Password',
			],
		],	
	],
	'redirect' => [
		'success' => 'user/confirmation/biodata',
		'error' => 'user/form/biodata',
	],

];

$config['auth'] = 
[
	'argument' => [
		'select' => 'id,password',
		'table' => 'user',
		'where' => [
			'email' => 'email|data',
		],
	],
	'roles' => [
		'select' => 'role_id',
		'table' => 'user_role',
		'where' => [
			'user_id' => 'user_id|data',
		] 
	],
	'validation' => [
		'email' => [
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email',
		],
		'password' => [
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|min_length[6]|max_length[20]',			
		],
	],
	'post' => [
			'email',
	],
	'redirect' => [
		'success' => 'guest/confirmation/login',
		'error' => 'guest/form/login',
	],
];