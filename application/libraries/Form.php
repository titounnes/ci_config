<?php 

class Form {

	protected $data;
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

	public function setData($data, $message='')
	{
		$this->data = $data;
		$this->message = $message;
 	}

	public function setFormat($format)
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
				$output .= '<a class="btn btn-'.(isset($f['current']) ? 'info btn-disabled" disabled="disabled"' : 'warning"').' href="/'.$f['url'].'#">'. $f['label'].'</a> &nbsp;';
			}
			$output .= '</div>';
		}

		
		$output .= '<div id="form-container"> <h3>'. $this->format['title'] .' </h3>';
		$output .= $this->message !=null ? 
			'<div class="alert alert-warning"><strong>Warning!</strong> ' . $this->message .'</div>' : '';
		$output .= isset($this->format['multipart']) ? form_open_multipart($this->format['anchor']['submit']['action']) : form_open($this->format['anchor']['submit']['action']) ;
		foreach($this->format['html'] as $k=>$f)
		{
			$output .= isset($f['label']) ? '<div>' . $f['label'] . '</div>' : '' ;
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
				case 'currency' :
					$output .=  '<span class="form-control">Rp.  '. number_format((float) $data,2, ',', '.') . '</span>';
					break;
				case 'file' :
					$output .=  '<input class="form-control" type="file" name="'.$k.'">';
					break;
				case 'image' :
					if(file_exists(APPPATH . 'writeable/'. $f['dir'] . $data .'.png'))
					{
						$path = urlencode($this->CI->encryption->encrypt($f['dir'].$data));
						$output .=  '<img width="240px" src="'.$f['url'].$path.'"/>';
					}
					break;
				case 'badge' :
					$output .= file_exists($f['path']. $this->CI->session->user_id .'.dat') ?
						'<span class="form-control glyphicon glyphicon-check"> Sudah Diunggah</span>' :
						'<span class="form-control glyphicon glyphicon-remove"> Belum Diunggah</span>';	
					break;
				case 'option' :
					$option[''] = 'Pilih Salah satu';
					if(isset(['option']['table']))
					{
						foreach($this->CI->db->select('id,name')->from($f['option']['table'])->get()->result() as $o)
						{
							$option[$o->id] = $o->name;
						}
					}
					else 
					{
						$option = $f['list']; 
					}

					$output .= form_dropdown($k, $option, $data,  'class="form-control"');
					break;
			}
			$output .= '<br>';
		}
		if(is_array($this->format['anchor']) && count($this->format['anchor'])>0)
		{
			$ids = explode('/',$this->format['anchor']['submit']['action']);
			$id = $ids[count($ids)-1];
			foreach($this->format['anchor'] as $k=>$a)
			{
				$output .= ($k=='submit') ? 
					'<button class="btn btn-info" href="#'.$id.'" onclick="">' . $a['label'] .'</button> ' :
					'<a class="btn btn-info" href="/'. $a['action'] .'">' . $a['label'] .'</a> ';
			}
		}
		$output .= form_close();
		$output .= '</div>';

		$this->CI->layout->setContent($output);
		$this->CI->layout->render();
	}
}