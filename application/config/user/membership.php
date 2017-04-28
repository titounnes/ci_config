<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['flow'] = 
[
	'biodata' => [
		'label' => 'Data Diri',
		'url' => 'user/form/biodata#biodata'
	],
	'membership' => [
		'label' => 'Partisipasi',
		'url' => 'user/form/membership#biodata',
		'current' => 1,
	],
	'payment' => [
		'label' => 'Pembayaran',
		'url' => 'user/form/payment#biodata'		
	],
	'struct' => [
		'label' => 'Struk',
		'url' => 'user/form/struct#biodata'
	],
];

$config['form'] = 
[
	'argument' => [
		'select' => 'um.member_id',
		'table' => 'user u',
		'join' => [
			['user_member um','um.user_id=u.id','left'],
		],
		'where' => [
			'u.id'=>'user_id|session',
		]
	],
	'form' => [
		'title' => 'Form Kepesertaan',
		'anchor' => [
			'submit' => [
				'action' => '/user/submit/membership',
				'label' => 'Submit',
			],
			'back' => [
				'action' => '',
				'label' => 'Home',
			],
		],
		'html' => [
			'member_id' => [
				'type' => 'option',
				'label' => 'Mendaftar Sebagai',
				'option' => [
					'table' => 'member',
					'order' => 'id',
				],
			],
		],	
	],
];

$config['submit'] = [
	'check' => [
		'table' => 'user_member',
		'where' => [
			'user_id' => 'user_id|session'
		],
	],
	'insert' => [
		'table' => 'user_member',
		'field' => [
			'member_id',
			'user_id'
		],
		'session' => [
			'user_id' => 'user_id',
		],
	],
	'update' => [
		'table' => 'user_member',
		'field' => [
			'member_id',
		],
		'where' => [
			'user_id' => 'user_id',
		],
	],
	'validation' => [
		'member_id' => [
			'field' => 'member_id',
			'label' => 'kepesertaaan',
			'rules' => 'required|max[5]|min[1]',
		],
	],
	'post' => [
		'member_id',
	],
	'redirect' => [
		'success' => 'user/confirmation/membership',
		'error' => 'user/form/membership',
	],
];

$config['confirmation'] = 
[
	'html' => [
		'anchor' => [
			'back' => [
				'action' => 'user/form/biodata',
				'label' => 'back',
			],
			'edit' => [
				'action' => 'user/form/membership',
				'label' => 'Edit',
			],
			'next' => [
				'action' => 'user/form/payment',
				'label' => 'Next',
			],
		],
		'notif' => 'success',
		'title' => 'Konfirmasi Kepesertaan',
		'message' => '<p>Kepesertaan Anda Telah Tercatat. Jika anda sudah melakukan pembayaran, kepesertaan tidak bisa diubah.</p>',
	],
];
