<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Build extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(['layout']);

	}

	public function index()
	{
		$layout = new Layout;
		$content = '<img src="http://snkpk.web.id/wp-content/uploads/2017/04/unnes.jpeg" align="center" width="100%">
			<h1 align="center"><?= $title ?></h1>';
			
		$layout->setContent($content);
		$layout->render();
	}
}
