<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['flow'] = 
[
	'biodata' => [
		'label' => 'Data Diri',
		'url' => 'user/form/biodata#biodata'
	],
	'membership' => [
		'label' => 'Partisipasi',
		'url' => 'user/form/membership#biodata'		
	],
	'payment' => [
		'label' => 'Pembayaran',
		'url' => 'user/form/payment#biodata'
	],
	'struct' => [
		'label' => 'Struk',
		'url' => 'user/form/struct#biodata',
		'current' => 1,
	],
];

$config['form'] = 
[
	'form' => [
		'title' => 'Form Upload Struk Pembayaran',
		'multipart' => 1,
		'anchor' => [
			'submit' => [
				'action' => '/user/upload/struct',
				'label' => 'Submit',
			],
			'back' => [
				'action' => '',
				'label' => 'Home',
			],
		],
		'html' => [
			'status' => [
				'type' => 'badge',
				'label' => 'Status berkas',
				'path'	=> APPPATH . 'writeable/struct/',
			],
			'struct' => [
				'type' => 'file',
				'label' => 'Foto /Scan Struk (Format JPG, PNG)<br>Maksimum 512 kb',
			],
		],	
	],
];

$config['upload'] = [
	'upload' => [
		'upload_path' => APPPATH . 'writeable/struct/',
		'allowed_types' => 'jpg|png',
		'max_size' => 512,
	],
	'file' => 'struct',
	'redirect' => [
		'success' => 'user/confirmation/struct',
		'error' => 'user/form/struct',
	],
];

$config['confirmation'] = 
[
	'html' => [
		'anchor' => [
			'back' => [
				'action' => 'user/form/payment',
				'label' => 'Back',
			],
			'edit' => [
				'action' => 'user/form/struct',
				'label' => 'Re-Upload',
			],
			'next' => [
				'action' => 'user/form/abstract',
				'label' => 'Next',
			],
		],
		'notif' =>  'success',
		'title' => 'Upload Struk Pembayaran',
		'message' => '<p>Berkas struk pembayaran berhasil diunggah. Tunggu Konfirmasi dari panitia</p>',
	],
];
