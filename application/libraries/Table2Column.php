<?php 

class Table2Column {

	protected $data;
	protected $title;
	protected $content;
	protected $anchor;
	protected $message;
	protected $flow;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper(['form']);
		$this->CI->load->library(['form_validation','session','layout','encryption']);
		$this->CI->load->database();
	}

	public function setTitle($title)
	{
		$this->title = $title;
 	}

 	public function setFlow($flow)
	{
		$this->flow = $flow;
	}

	public function setData($data)
	{
		$this->data = $data;
 	}

	public function setFormat($format)
	{
		$this->format = $format;
	}

	public function render()
	{
		$output = '';
			
		if(is_array($this->flow) and count($this->flow)>1)
		{
			$output .= '<div id="time-line">';
			foreach($this->flow as $f)
			{
				$output .= '<a class="btn btn-'.(isset($f['current']) ? 'info" onclick="return false;" disabled="disabled"' : 'warning"').' href="/'.$f['url'].'#">'. $f['label'].'</a> &nbsp;';
			}
			$output .= '</div>';
		}

		$output .= '<div id="form-container"> <h3>'. $this->format['title'] .' </h3>';
		
		if(isset($this->format['button'])){
			
			$output .= '<div>';
			foreach($this->format['button'] as $b)
			{
				$output .= '<span text-align="center"><a href="#" onclick="'.$b['action'].'" style="margin:auto"> <span class="glyphicon glyphicon-print"></span></a> '.$b['label'].'</span>';
			}
			$output .= '</div><br>';
		}

		foreach($this->format['html'] as $k=>$f)
		{
			$output .= isset($f['label']) ? '<label>' . $f['label'] . '</label>' : '' ;
			switch($f['data'])
			{
				case 'field' :
					$output .=  '<span class="form-control">';
					$output .= str_replace('|',' ',$this->data->{$k});
					$output .= '</span>';
					break;
				case 'file' :
					$output .=  '<span class="form-control">';
					$file = file_exists(APPPATH . 'writeable/'. $k. '/'. $this->CI->session->user_id .'.dat');
					$path = urlencode($this->CI->encryption->encrypt($k. '/'. $this->CI->session->user_id));
					$output .= ($file ? 'Sudah diunggah &nbsp;<a href="/'.$f['url'].'/'.$path.'"><span class="glyphicon glyphicon-download-alt"></span></a>' : 'Belum diunggah');
					$output .= '</span>';
					break;
				case 'note' :
					$replacement = explode('#', $this->data->{$k});
					$tpl = APPPATH . 'template/factur.tpl';
					$file = fopen($tpl, 'r');
					$content = fread($file, filesize($tpl));
					fclose($file);
					$output .= '<iframe name="printFrame" src="/user/pdf/factur" style="display:none"></iframe>';
					//$output .=  vsprintf($content, $replacement) ;
					break;
			}
			$output .= '<br>';
		}
		$output .= '</div>';

		$this->CI->layout->setContent($output);
		$this->CI->layout->render();
	}
}