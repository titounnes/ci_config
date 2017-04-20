<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->logedIn==true)
		{
			redirect('');
			return false;
		}
	}

	function index()
	{
		echo 'Jika halaman ini muncul, artinya alamat url yang anda akses salah';
	}
}