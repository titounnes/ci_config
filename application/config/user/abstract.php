<?php

$config['form'] = 
[
	'form' => [
		'title' => 'Form Upload Abstrak',
		'multipart' => 1,
		'anchor' => [
			'submit' => [
				'action' => '/user/upload/abstract',
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
				'path'	=> APPPATH . 'writeable/abstract/',
			],
			'abstract' => [
				'type' => 'file',
				'label' => 'Berkas Abstrak (Format DOC atau DOCX)<br>Maksimum 512 kb',
			],
		],	
	],
];

$config['upload'] = [
	'upload' => [
		'upload_path' => APPPATH . 'writeable/abstract/',
		'allowed_types' => 'doc|docx',
		'max_size' => 512,
	],
	'file' => 'abstract',
	'redirect' => [
		'success' => 'user/confirmation/abstract',
		'error' => 'user/form/abstract',
	],
];

$config['confirmation'] = 
[
	'html' => [
		'anchor' => [
			'back' => [
				'action' => 'user/form/abstract',
				'label' => 'Back',
			],
			'edit' => [
				'action' => 'user/form/abstract',
				'label' => 'Re-Upload',
			],
			'next' => [
				'action' => 'user/form/fullpapper',
				'label' => 'Next',
			],
		],
		'notif' =>  'success',
		'title' => 'Upload Berkas Abstrak',
		'message' => '<p>Berkas abstrak berhasil diunggah. Tunggu review dari tim kami</p>',
	],
];
