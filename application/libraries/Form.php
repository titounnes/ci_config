<?php 

class Form {

	protected $data;
	protected $content;
	protected $anchor;
	protected $message;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper(['form']);
		$this->CI->load->library(['form_validation','session','layout']);
		$this->CI->load->database();
	}

	public function setData($data, $message='')
	{
		$this->data = $data;
		$this->message = $message;
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
		$output .= $this->message !=null ? 
			'<div class="alert alert-warning"><strong>Warning!</strong> ' . $this->message .'</div>' : '';
		$output .= isset($this->format['multipart']) ? form_open_multipart($this->format['anchor']['submit']['action'].'#'.$id) : form_open($this->format['anchor']['submit']['action'].'#'.$id) ;
		foreach($this->format['html'] as $k=>$f)
		{
			$output .= isset($f['label']) ? '<label>' . $f['label'] . '</label>' : '' ;
			$extra = isset($f['class']) ? 'class="'.$f['class'].'"' : '' ;
			$data = $this->CI->session->set_val->{$k} ?? ($this->data->{$k} ?? '');

			switch($f['type'])
			{	
				case 'text' :
					$output .= '<input class="form-control" placeholder="'. $f['place-holder'] .'" type="text" name="'.$k.'" value="' . $data .'" size="50" />';
					break;
				case 'phone' :
					$output .=  '<input class="form-control" placeholder="'. $f['place-holder'] .'" type="phone" name="'.$k.'" value="' . $data .'" size="50" />';
					break;
				case 'textarea' :
					$output .=  '<textarea title="'.$f['place-holder'].'" class="form-control" name ="'.$k.'">'. $data .'</textarea>';
					break;
				case 'hidden' :
					$output .=  form_hidden($k, '');
					break;
				case 'password' :
					$output .=  '<input class="form-control" placeholder="'. $f['place-holder'] .'"  type="password" name="'.$k.'" value="' .$data . '" size="50" />';
					break;
				case 'email' :
					$output .=  '<input class="form-control" placeholder="'. $f['place-holder'] .'"  type="email" name="'.$k.'" value="' . $data . '" size="50" />';
					break;
				case 'label' :
					$output .=  '<span class="form-control">'. $data . '</span>';
					break;
				case 'file' :
					$output .=  '<input class="form-control" type="file" name="'.$k.'">';
					break;
				case 'badge' :
					$output .= file_exists($f['path']. $this->CI->session->user_id .'.dat') ?
						'<span class="form-control glyphicon glyphicon-check"> Sudah Diunggah</span>' :
						'<span class="form-control glyphicon glyphicon-remove"> Belum Diunggah</span>';	
					break;
				case 'option' :
					$option[] = 'Pilih Salah satu';
					foreach($this->CI->db->select('id,name')->from($f['option']['table'])->get()->result() as $o)
					{
						$option[$o->id] = $o->name;
					}
								
					$output .= form_dropdown($k, $option, $data,  'class="form-control"');
					break;
			}
			$output .= '<br>';
		}

		$output .= '<a class="btn btn-success" href="/'. $this->format['anchor']['back']['action'] .'">' . $this->format['anchor']['back']['label'] .'</a> ';
		$output .= '<button class="btn btn-info" href="#'.$id.'">' . $this->format['anchor']['submit']['label'] .'</button> ';
		$output .= form_close();
		$output .= '</div>';

		$this->CI->layout->setContent($output);
		$this->CI->layout->render();
	}
}