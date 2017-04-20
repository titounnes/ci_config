<?php 

class Confirmation {

	protected $data;
	protected $format = [];

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library(['form_validation','session','layout']);

	}
	
	public function setData($data)
	{
		$this->data = $data;
	}

	public function setFormat($format = [])
	{
		$this->format = $format;
	}

	public function render()
	{
		$output = '<section style="width:600px;margin:auto;min-height:70%">
					<h1>' . $this->format['title'] . '</h1>
					<div class="alert alert-' . $this->format['notif'] .'">
	 					<strong>Success!</strong> ' . $this->format['message'] . '
					</div>
					<a class="btn btn-info" href="/">Home</a> ';
		foreach($this->format['anchor'] as $a)
		{
			$ids =	explode('/',$a['action']);
			$id = $ids[count($ids)-1];
			$output .= '<a class="btn btn-info" href="/'. $a['action'] .'#'.$id .'">'. $a['label'] .'</a> ';
		}
		$output .= '</section>';
		
		$this->CI->layout->setContent($output);
		$this->CI->layout->render();
	}
}