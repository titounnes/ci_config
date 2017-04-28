<?php 

class Confirmation {

	protected $format = [];
	protected $flow;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library(['form_validation','session','layout']);

	}
	
	public function setFormat($format = [])
	{
		$this->format = $format;
	}

	public function setFlow($flow)
	{
		$this->flow = $flow;
	}


	public function render()
	{
		$output = '';
			
		if(is_array($this->flow) and count($this->flow)>1)
		{
			$output .= '<div id="time-line">';
			foreach($this->flow as $f)
			{
				$output .= '<a class="btn btn-'.(isset($f['current']) ? 'info" disabled' : 'warning"').' href="/'.$f['url'].'#">'. $f['label'].'</a> &nbsp;';
			}
			$output .= '</div>';
		}

		$output .= '<section style="width:600px;margin:auto;min-height:70%">
					<h1>' . $this->format['title'] . '</h1>
					<div class="alert alert-' . $this->format['notif'] .'">
	 					<strong>Success!</strong> ' . vsprintf($this->format['message'], $this->CI->session->flash) . '
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