<?php 

class Table {

	protected $header;
	protected $data;
	protected $format;
	protected $rows = [];
	protected $id = [];
	protected $anchor;
	protected $currentRow;
	protected $flow;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library(['session','layout','encryption']);
		
	}
	
	public function setFlow($flow)
	{
		$this->flow = $flow;
	}


	public function setContent($data)
	{
		$this->data = $data;
	}

	public function setFormat($format)
	{
		$this->format = $format;
	}


	private function newRow($id)
	{
		$this->currentRow = count($this->rows);
		$this->id[$this->currentRow] = $id;
	}

	private function setCell($data = '')
	{
		if(isset($this->rows[$this->currentRow]))
		{
			$this->rows[$this->currentRow] .= '<td>' . $data . '</td>';
		}
		else
		{
			$this->rows[$this->currentRow] = '<td>' . $data . '</td>';	
		}
	}


	private function setAnchor($anchor)
	{
		if($this->anchor =='')
		{
			$this->anchor= $anchor;	
		}  

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

		$ids = explode('/',$this->format['anchor']['submit']['action']);
		$id = $ids[count($ids)-1];

		$output .= '<h3>'. $this->format['title'] .' </h3>';

		$output .= '<table class="table table-bordered">';
		$output .= '<thead><tr>';
		foreach($this->format['header'] as $h)
		{
			$output .= '<th>'. $h .'</th>';
		}

		$output .= '<tbody>';
		foreach($this->data as $k=>$d)
		{
			$output .= '<tr>';
			foreach($this->format['body'] as $name=>$b)
			{
				$output .= '<td>';
				switch($b['label'])
				{
					case 'key' : 
						$output .= $k+1;
						break; 
					case 'data' :
						$output .= str_replace('#','<br>',str_replace('|',' ',$d->{$name}));
						break;
					case 'image' :
						$file = file_exists(APPPATH . 'writeable/'. $d->{$name} .'.png');
						$path = urlencode($this->CI->encryption->encrypt($d->{$name}));
						$output .= $file ? '<img width="240px" src="/'.$b['url'].'/'. $path.'"/>':'';
						break;
					case 'action' :
						$output .= '<a class="btn btn-success" href="/'.$b['url'].$d->{$b['param']}.'" onclick=\"window.open(src="")\">'.$b['caption'].'</a>';
						break;
				}
				$output .= '</td>';	
			}
			$output .= '</tr>';
		}
		$output .= '</tbody>';

		$output .= '</tr></thead>';
		$output .= '</table>';
		$this->CI->layout->setContent($output);
		$this->CI->layout->render();
	}
}