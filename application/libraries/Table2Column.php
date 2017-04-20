<?php 

class Table2Column {

	protected $data;
	protected $title;
	protected $content;
	protected $anchor;
	protected $message;

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
		$ids = explode('/',$this->format['anchor']['submit']['action']);
		$id = $ids[count($ids)-1];

		$output = '<div id="form-container"> <h3>'. $this->format['title'] .' </h3>';
		
		foreach($this->format['html'] as $k=>$f)
		{
			$output .= isset($f['label']) ? '<label>' . $f['label'] . '</label>' : '' ;
			$output .=  '<span class="form-control">';
			switch($f['data'])
			{
				case 'field' :
					$output .= str_replace('|',' ',$this->data->{$k});
					break;
				case 'file' :
					$file = file_exists(APPPATH . 'writeable/'. $k. '/'. $this->CI->session->user_id .'.dat');
					$path = urlencode($this->CI->encryption->encrypt($k. '/'. $this->CI->session->user_id));
					$output .= ($file ? 'Sudah diunggah &nbsp;<a href="/'.$f['url'].'/'.$path.'"><span class="glyphicon glyphicon-download-alt"></span></a>' : 'Belum diunggah');
					break;
			}
			$output .= '</span>';
			$output .= '<br>';
		}

		$output .= '</div>';

		$this->CI->layout->setContent($output);
		$this->CI->layout->render();
	}
}