&lt;?php defined('BASEPATH') OR exit('No direct script access allowed');

class **controller** extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		/*Tambahkan code untuk pengaturan hak akses di sini

		if($this->session->logedIn==false)
		{
			//redirect('');
			return false;
		}
		*/
	}

	function index()
	{
		echo 'Jika halaman ini muncul, artinya alamat url yang anda akses salah';
	}
}