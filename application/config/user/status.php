<?php

$config['report2column'] = 
[
	'argument' => [
		'select' => 'b.id,concat(b.pre_name," ", b.full_name, if(b.post_name IS NULL,"",concat(", ",b.post_name))) as name, concat(b.affiliation, " / ",b.address) as office, concat(u.email, " / ",b.phone) as contact, m.name as membership, if(um.confirm=1,"Sudah|dikonfirmasi","Belum|dikonfirmasi") as confirm',
		'table' => 'user u',
		'join' => [
			['biodata b','u.id=b.id','left'],
			['user_member um','um.user_id=u.id','left'],
			['member m','m.id=um.member_id','left'],
		],
		'where' => [
			'u.id'=>'user_id|session',
		]
	],
	'format' => [
		'title' => 'Status Pendaftaran Anda',
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
			'name' => [
				'data' => 'field',
				'label' => 'Nama lengkap dengan gelar',
			],
			'office' => [
				'data' => 'field',
				'label' => 'Nama Institusi / Alamat',
			],
			'contact' => [
				'data' => 'field',
				'label' => 'E-mail / Telp.',
			],
			'membership' => [
				'data' => 'field',
				'label' => 'Terdaftar sebagai',
			],
			'confirm' => [
				'data' => 'field',
				'label' => 'Status Pembayaran',
			],
			'abstract' => [
				'data' => 'file',
				'label' => 'Berkas Abstrak',
				'url' => 'user/download/abstract',
			],
			'fullpapper' => [
				'data' => 'file',
				'label' => 'Berkas Artikel',
				'url' => 'user/download/fullpapper',
			],
		],	
	],
];
