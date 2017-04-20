<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(['session','encryption']);
		$this->load->config('assets');
		if($this->session->logedIn==false)
		{
			redirect('/');
			return false;
		}
	}

	function file($param)
	{
		
		$target =  $this->encryption->decrypt(urldecode($param));
		if(! $target)
		{
			echo $this->config->item('bootstrap');
			?>
			<h3>Halaman Download </h3>
			<div class="alert alert-warning"><strong>Warning!</strong> Tautan yang anda gunakan sudah kadaluwarsa</div>
			<?php
			return false;
		}
		$name = str_replace('/', '_', $target);
		$file = fopen(APPPATH . 'writeable/'.$target.'.dat','r');
		$content = @fread($file, filesize(APPPATH . 'writeable/'.$target.'.dat'));
		fclose($file);

		$this->output->set_header('HTTP/1.0 200 OK')
			->set_header('HTTP/1.1 200 OK')
			->set_header('Cache-Control: no-store, no-cache, must-revalidate')
			->set_header('Cache-Control: pos t-check=0, pre-check=0')
			->set_header('Pragma: no-cache')
			->set_content_type('application/docx')
			->set_header('Content-Disposition: inline; filename="'.$name.'.docx"')
		    ->set_output(gzuncompress($content));
	}
}