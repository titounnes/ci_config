<?php

$config['form'] = 
[
	'argument' => [
		'select' => '',
		'table' => '',
		'where' => [
			'id'=>'',
		]
	],
	'form' => [
		'title' => '',
		'anchor' => [
			'submit' => [
				'action' => '/**actor**/submit/**object**',
				'label' => 'Submit',
			],
			'back' => [
				'action' => '',
				'label' => 'Home',
			],
		],
		'html' => [
			'field' => [
				'type' => '', /* text,textarea,phone,email,select */
				'place-holder' => '',
				'label' => '',
			],
		],	
	],
];

$config['submit'] = [
	'check' => [
		'table' => '**object**',
		'where' => [
			'id' => '**actor**_id|session'
		],
	],
	'insert' => [
		'table' => '',
		'field_name' => [
		],
		'session' => [
		],
	],
	'update' => [
		'table' => '',
		'field' => [
		],
		'where' => [
		],
	],
	'validation' => [
		'field_name' => [
			'field' => '',
			'label' => '',
			'rules' => '',			
		],
	],
	'post' => [
	],
	'redirect' => [
		'success' => '**actor**/confirmation/**object**',
		'error' => '**actor**/form/**object**',
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
				'action' => '**actor**/form/**object**',
				'label' => 'Edit',
			],
			'next' => [
				'action' => '**actor**/form/',
				'label' => 'Next',
			],
		],
		'notif' => 'success',
		'title' => '',
		'message' => '',
	],
];
