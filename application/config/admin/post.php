<?php defined('BASEPATH') OR exit('No direct script access allowed');
    
$config['list'] = 
[
	'argument' => [
		'select' => 'id,title,content',
		'table' => 'post',
	],	
	'anchor' => [
		'edit' => 'admin/form/post/',
		'read' => 'admin/read/post/',
	],
];

$config['read'] = 
[
	'argument' => [
		'select' => 'id,title,content',
		'table' => 'post',
		'where' => [
			'id'=>'id|data',
		]
	],
	'anchor' => [
		'edit' => 'admin/form/post/',
		'back' => 'admin/list/post/',
	],	
];

$config['form'] = 
[
	'argument' => [
		'select' => 'id,title,content',
		'table' => 'post',
		'where' => [
			'id'=>'id|data',
		]
	],
	'form' => [
		'anchor' => [
			'submit' => 'admin/submit/post',
			'back' => 'admin/list/post',
		],
		'html' => [
			'id' => [
				'type' => 'hidden',
			],
			'title' => [
				'type' => 'text',
				'class' => 'form-control',
				'label' => 'Judul Artikel',
			],
			'content' => [
				'type' => 'textarea',
				'label' => 'Isi Artikel',
				'class' => 'form-control',
			],
		],	
	],
];

$config['submit'] = 
[
	'update' => [
		'table' => 'post',
		'field' => [
			'title',
			'content',
		],
		'where' => [
			'id' 
		],
	],
	'insert' => [
		'table' => 'post',
		'field' => [
			'title',
			'content',
		],
		'session' => 'id',
	],
];