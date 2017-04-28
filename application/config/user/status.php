<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*$config['flow'] = 
[
	'status' => [
		'label' => 'Status Pendaftaran',
		'url' => 'user/report2column/status#status',
		'current' => 1,
	],
	'print' => [
		'label' => 'Cetak Bukti Pembayaran',
		'url' => 'user/report2column/factur#status'
	],
];
*/
$config['report2column'] = 
[
	'argument' => [
		'select' => 'concat(b.pre_name," ", b.full_name, if(b.post_name IS NULL,"",concat(", ",b.post_name))) as name, concat(b.affiliation, " / ",b.address) as office, concat(u.email, " / ",b.phone) as contact, m.name as membership, if(um.confirm=1,"Sudah|dikonfirmasi","Belum|dikonfirmasi") as confirm, concat( b.full_name, "#",m.fee,"#",m.money,"#",m.name,"#") as data',
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
		'button' => [
			'print' => [
				'icon' => 'print',
				'action' => 'printing(\'factur\')',
				'label' => 'Cetak Bukti Pembayaran',
			],
		],	
		'title' => 'Status Pendaftaran Anda',
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
			'data' => [
				'data' => 'note',
				'label' => '',
			],

		],	
	],
];
