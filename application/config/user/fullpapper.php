<?php

$config['form'] = 
[
	'form' => [
		'title' => 'Form Upload Artikel',
		'multipart' => 1,
		'anchor' => [
			'submit' => [
				'action' => '/user/upload/fullpapper',
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
				'path'	=> APPPATH . 'writeable/fullpapper/',
			],
			'fullpapper' => [
				'type' => 'file',
				'label' => 'Berkas Artikel (Format DOC atau DOCX)<br>Maksimum 1024 kb',
			],
		],	
	],
];

$config['upload'] = [
	'upload' => [
		'upload_path' => APPPATH . 'writeable/fullpapper/',
		'allowed_types' => 'doc|docx',
		'max_size' => 1024,
	],
	'file' => 'fullpapper',
	'redirect' => [
		'success' => 'user/confirmation/fullpapper',
		'error' => 'user/form/fullpapper',
	],
];

$config['confirmation'] = 
[
	'html' => [
		'anchor' => [
			'back' => [
				'action' => 'user/form/fullpapper',
				'label' => 'Back',
			],
			'edit' => [
				'action' => 'user/form/fullpapper',
				'label' => 'Re-Upload',
			],
			'next' => [
				'action' => 'user/report2column/status',
				'label' => 'Next',
			],
		],
		'notif' =>  'success',
		'title' => 'Upload Berkas Artikel',
		'message' => '<p>Berkas artikel berhasil diunggah. Tunggu review dari tim kami</p>',
	],
];
