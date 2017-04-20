<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaseModel extends MY_Model 
{
	function execute($arguments=[],$param=[],$data=[])
	{
		$this->table = $arguments['table'];
		
		$this->select = '';
		
		if(isset($arguments['select']))
		{
			if(isset($arguments['param']))
			{
				foreach($arguments['param'] as $v)
				{
					$var = explode('|',$v);
					$replacement[] = $var[1]=='post' ? 
						$this->input->post($var[0]) :
						$this->session->{$var[0]};
				}
				$this->select = vsprintf($arguments['select'], $replacement);
			}
			else
			{
				$this->select = $arguments['select'];
			}
		}

		$this->join = [];
		
		if(isset($arguments['join']))
		{
			foreach($arguments['join'] as $v)
			{
				if(!isset($v[3]))
				{
					$this->join[] = $v;
				}
				else
				{
					foreach($v[3] as $k=>$w)
					{
						$var = explode('|',$w);
						$replacement[] = $var[1]=='post' ? 
						$this->input->post($var[0]) : (
							$var[1]=='get' ? 
							$this->input->get($var[0]) :
							$this->session->{$var[0]}
						);
					}
					$v[0] = vsprintf($v[0], $replacement);
					$v[1] = vsprintf($v[1], $replacement);
					$this->join[] = $v;
				}
			}
		}

		$this->where = [];

		if(is_array($param))
		{
			foreach($param as $key=>$val)
			{
				$this->where[$key] == $val;
			}
		}

		if(isset($arguments['where']) && is_array($arguments['where']))
		{
			foreach($arguments['where'] as $k => $v)
			{
				if($k == 'bind')
				{
					foreach($v as $l=>$w)
					{
						$param = explode('|',$w);
						$replacement2[] = $param[1]=='post' ? 
						$this->input->post($param[0]) : 
							( $param[1]=='session' ? 
								$this->session->{$param[0]} :
								$this->data[$param[0]]
							);
						$l = vsprintf($l, $replacement2);
						$this->where[$l] = '';
					}
					
				}
				else
				{
					$param = explode('|',$v);
					if(!isset($param[1]))
					{
						$this->where[$k] = $v;	
					}
					else if(!isset($param[2]))
					{
						if($param[1]=='session')
						{
							$this->where[$k] = $this->session->{$param[0]};
						}
						else if($param[1]=='post')
						{
							$this->where[$k] = $this->input->post($param[0]);
						}
						else if($param[1]=='data')
						{
							$this->where[$k] = $this->data[$param[0]];	
						}	
					}
					else
					{
						$key = explode('-',$k);
						if($param[1]=='session')
						{
							$val = explode('_',$this->session->{$param[0]});
							$this->where[$key[$param[2]]] = $val[$param[2]];
						}
						else if($param[1]=='post')
						{
							$val = explode('_',$this->input->post($param[0]));
							$this->where[$key[$param[2]]] = $val[$param[2]];
						}	
						else
						{
							$this->where[$key[$param[2]]] = $this->data[$param[2]];
						}
					}
				}
			}
		}

		if(isset($arguments['id']))
		{
			$table = explode(' ',$arguments['table']);
			$this->where[$table[0].'.id'] = $arguments['id']; 
		}
		
		$this->order = '';

		if(isset($arguments['order']))
		{
			$this->order = $arguments['order']; 
		}
		
		$this->group = '';
		
		if(isset($arguments['group']))
		{
			$this->group = $arguments['group']; 
		}
		$keyword = isset($arguments['keyword']) ? '%' .str_replace('%20', ' ', $arguments['keyword']) : '';
		$offset = isset($arguments['offset'])?$arguments['offset'] : 0;
		$limit = isset($arguments['limit']) ? $arguments['limit'] : 0;
		return $this->get($keyword, $offset, $limit); 
		//return $this->getStatement();
	}
}