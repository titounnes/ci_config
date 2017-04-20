<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends UserLogin_Controller {

	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		if($this->controller == 0)
		{
			echo 'Jika halaman ini muncul, artinya alamat url yang anda akses salah';
		}
	}
}