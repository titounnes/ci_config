<?php

$config['form'] = 
[
	'argument' => [
		'select' => 'id,pre_name,full_name, post_name,affiliation,phone,address',
		'table' => 'biodata',
		'where' => [
			'id'=>'user_id|session',
		]
	],
	'form' => [
		'title' => 'Biodata Peserta Seminar',
		'anchor' => [
			'submit' => [
				'action' => '/user/submit/biodata',
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
			'pre_name' => [
				'type' => 'text',
				'place-holder' => 'Gelar Di Depan Nama',
				'label' => 'Gelar Depan',
			],
			'full_name' => [
				'type' => 'text',
				'place-holder' => 'Nama lengkap',
				'label' => 'Nama Lengkap',
			],
			'post_name' => [
				'type' => 'text',
				'place-holder' => 'Gelar Di Belakang Nama',
				'label' => 'Gelar Belakang',
			],
			'affiliation' => [
				'type' => 'textarea',
				'label' => 'Nama Institusi',
				'place-holder' => 'Nama Institusi',	
			],
			'address' => [
				'type' => 'textarea',
				'label' => 'Alamat Institusi',
				'place-holder' => 'Alamat Institusi',
			],
			'phone' => [
				'type' => 'phone',
				'label' => 'Nomor Telpon',
				'place-holder' => 'Nomor Telpon',
			],
		],	
	],
];

$config['submit'] = [
	'check' => [
		'table' => 'biodata',
		'where' => [
			'id' => 'user_id|session'
		],
	],
	'insert' => [
		'table' => 'biodata',
		'field' => [
			'pre_name',
			'post_name',
			'full_name',
			'affiliation',
			'address',
			'phone',
		],
		'session' => [
			'id' => 'user_id',
		],
	],
	'update' => [
		'table' => 'biodata',
		'field' => [
			'pre_name',
			'post_name',
			'full_name',
			'affiliation',
			'address',
			'phone',
		],
		'where' => [
			'id' => 'user_id',
		],
	],
	'validation' => [
		'pe_name' => [
			'field' => 'pre_name',
			'label' => 'gelar depan',
			'rules' => 'trim',
		],
		'full_name' => [
			'field' => 'full_name',
			'label' => 'nama lengkap',
			'rules' => 'trim|required',			
		],
		'post_name' => [
			'field' => 'post_name',
			'label' => 'gelar belakang',
			'rules' => '',			
		],
		'affiliation' => [
			'field' => 'affiliation',
			'label' => 'nama institusi',
			'rules' => 'required',			
		],
		'address' => [
			'field' => 'address',
			'label' => 'alamat institusi',
			'rules' => 'required',			
		],
		'phone' => [
			'field' => 'phone',
			'label' => 'nomor telpon',
			'rules' => 'required',			
		],
	],
	'post' => [
		'pre_name',
		'post_name',
		'full_name',
		'affiliation',
		'address',
		'phone',
	],
	'redirect' => [
		'success' => 'user/confirmation/biodata',
		'error' => 'user/form/biodata',
	],
];

$config['confirmation'] = 
[
	'html' => [
		'anchor' => [
			'back' => [
				'action' => '',
				'label' => 'Home',
			],
			'edit' => [
				'action' => 'user/form/biodata',
				'label' => 'Edit',
			],
			'next' => [
				'action' => 'user/form/membership',
				'label' => 'Next',
			],
		],
		'notif' => 'success',
		'title' => 'Konfirmasi Pengisian Biodata',
		'message' => '<p>Pengisian biodata berhasil</p>',
	],
];
