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
		'title' => 'Konfirmasi Pendaftaran',
		'message' => '<p>Pendaftaran Berhasil</p>',
	],
];

$config['form'] = 
[
	'argument' => [
		'select' => 'id,email',
		'table' => 'user',
	],
	'form' => [
		'title' => 'Pendaftaran Peserta Seminar',
		'anchor' => [
			'submit' => [
				'action' => '/guest/signup/signup',
				'label' => 'Submit',
			],
			'back' => [
				'action' => '',
				'label' => 'Home',
			],
		],
		'html' => [
			'id' => [
				'type' => 'hidden',
			],
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
			're-password' => [
				'type' => 'password',
				'label' => 'Ketik Ulang Password',
				'place-holder' => 'Konfirmasi Password',
			],
		],	
	],
];

$config['signup'] = 
[
	'insert' => [
		'table' => 'user',
		'field' => [
			'email',
			'password',
		],
	],
	'validation' => [
		'email' => [
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email|is_unique[user.email]',
		],
		'password' => [
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|min_length[6]|max_length[20]',			
		],
		're-password' => [
			'field' => 're-password',
			'label' => 'passwrod konfirmasi',
			'rules' => 'trim|matches[password]',			
		],
	],
	'post' => [
		'email',
	],
	'redirect' => [
		'success' => 'guest/confirmation/signup',
		'error' => 'guest/form/signup',
	],
];