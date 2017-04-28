<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['title'] = 'Selamat Datang Di Portal Pendaftaran<br>SNKPK Kimia FMIPA UNNES 2017';

$config['bootstrap'] = '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';

$config['css'] = '<link href="/assets/css/style.css?v='. filemtime(FCPATH.'assets/css/style.css'). '" rel="stylesheet" >';

$config['author'] = [
	'biodata' => [
		'label' => 'Formulir',
		'action' => 'user/form/biodata',
	],
	'abstrak' => [
		'label' => 'Unggah Dokumen',
		'action' => 'user/form/abstract'
	],
	'report' => [
		'label' => 'Status',
		'action' => 'user/report2column/status'
	],
];

$config['teller'] = [
	'registrar' => [
		'label' => 'Pendaftar',
		'action' => 'teller/table/awaitingMember'
	],
	'journal' => [
		'label' => 'Laporan',
		'action' => 'teller/table/report'
	],
];

$config['logedOut'] = [
	'signup' => [
		'label' => 'Pendaftaran',
		'action' => 'guest/form/signup',
	],
	'signin' => [
		'label' => 'Login',
		'action' => 'guest/form/login'
	],
];

$config['logedIn'] = [
	'label' => 'Logout',
	'action' => 'signout'
];