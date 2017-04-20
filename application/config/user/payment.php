<?php

$config['form'] = 
[
	'argument' => [
		'select' => 'um.*,m.fee,m.name as member, money',
		'table' => 'user u',
		'join' => [
			['user_member um','um.user_id=u.id','inner'],
			['member m','m.id=um.member_id','inner'],
		],
		'where' => [
			'u.id'=>'user_id|session',
		]
	],
	'form' => [
		'title' => 'Form Konfirmasi Pembayaran',
		'anchor' => [
			'submit' => [
				'action' => '/user/submit/payment',
				'label' => 'Submit',
			],
			'back' => [
				'action' => '',
				'label' => 'Home',
			],
		],
		'html' => [
			'fee' => [
				'type' => 'label',
				'label' => 'Biaya Pendaftaran',
			],
			'money' => [
				'type' => 'label',
				'label' => 'Terbilang',
			],
			'member' => [
				'type' => 'label',
				'label' => 'Mendaftar Sebagai',
			],
			'notif' => [
				'type' => 'textarea',
				'label' => 'Data transaksi dengan format:<br>Bank#NoRek#Nama#Trans#Tgl#Jam<br>Contoh: BNI#0123#Harjito#123#2017/04/17#20:00<div class="alert alert-info">Jika anda kesulitan mengisikan, anda bisa mengganti dengan upload struk transfer</div>',
				'place-holder' => 'Nama_Bank#No._Rekening#Nama_Pemilik_Rekening#Kode_Transaksi#Tanggal(yyyy/mm/dd)#Jam(hh/mm)',
			]
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
	'update' => [
		'table' => 'user_member',
		'field' => [
			'notif',
		],
		'where' => [
			'user_id' => 'user_id',
		],
	],
	'validation' => [
		'notif' => [
			'field' => 'notif',
			'label' => 'data transaksi',
			'rules' => 'required|regex_match[/^[A-Za-z\.\- ]+#[0-9.-]+#[A-Za-z\'. ]+#[A-Za-z0-9\.\- ]+#[0-9]{2,4}\/[0-9]{1,2}\/[0-9]{1,2}#[0-9]{1,2}:[0-9]{1,2}$/]',//$/]',
		],
	],
	'post' => [
		'notif',
	],
	'error' => [
		'message' => 'Anda harus menentukan kepesertaan',
		'back' => 'user/form/membership'
	],
	'redirect' => [
		'success' => 'user/confirmation/payment',
		'error' => 'user/form/payment',
	],
];

$config['confirmation'] = 
[
	'html' => [
		'anchor' => [
			'back' => [
				'action' => 'user/form/membership',
				'label' => 'Back',
			],
			'edit' => [
				'action' => 'user/form/payment',
				'label' => 'Edit',
			],
			'next' => [
				'action' => 'user/form/struct',
				'label' => 'Next',
			],
		],
		'notif' =>  'success',
		'title' => 'Notifikasi Pembayaran',
		'message' => '<p>Notifikasi telah berhasil dikirim. Tunggu konfirmasi dari panitia</p>',
	],
];
