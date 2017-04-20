<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	protected $table;
	protected $id = 'id';
	protected $fk = 'id';
	protected $select = '*';
	protected $order;
	protected $like = null; 
	protected $keyword;
	protected $group = null;
	protected $where = [];
	protected $join = [];
	protected $field = [];
	protected $query;

	public function getCount($keyword=null)
	{
		$this->db->from($this->table);
		foreach($this->join as $j)
		{
			$this->db->join($j[0],$j[1],$j[2]);
		}
		foreach ($this->where as $key => $value)
		{
			if($key != '')
			{
				$this->db->where($key,$value);
			}
			else
			{
				$this->db->where($value);
			}
		}
		
		if($keyword != null && $this->like != null)
		{
			$this->db->like($this->like,$keyword);
		}
		if($this->group != null)
		{
			$this->db->group_by($this->group);
		}
		$res = $this->db->get();
		return $res?$res->num_rows:0;
	}

	function getQuery($keyword=null,$offset=0,$limit=500)
	{
		$this->db
			->distinct()
			->select($this->select);
		if($this->table!=null)
		{
			$this->db->from($this->table);
		}
		foreach($this->join as $j)
		{
			$this->db->join($j[0],$j[1],$j[2]);
		}
		foreach ($this->where as $key => $value)
		{
			if($key != '')
			{
				if(is_integer($key))
				{
					$this->db->where($value);
				}
				else
				{
					if($value=='')
					{
						$this->db->where($key);	
					}
					else
					{
						$this->db->where($key,$value);
					}
				}
			}
			else
			{
				$this->db->where($value);
			}
		}
		if($keyword != null && $this->like != null)
		{
			$this->db->like($this->like,$keyword);
		}
		if($this->group != null)
		{
			$this->db->group_by($this->group);
		}
		if($limit>0)
		{
			$this->db->limit($limit, $offset);
		}
		$this->query = $this->db
			->order_by($this->order);
	}

	function get($keyword=null,$offset=0,$limit=0)
	{
		$this->getQuery($keyword,$offset,$limit);
		return $this->query->get();
	}

	function getAll($keyword=null,$offset=0,$limit=100)
	{
		$this->getQuery($keyword,$offset,$limit);
		return $this->query->get()->result(); 
	}

	function getStatement($keyword=null,$offset=0,$limit=100)
	{
		$this->getQuery($keyword,$offset,$limit);
		return $this->query->get_compiled_select(); 
	}

	function getOne($keyword=null)
	{
		$this->getQuery($keyword,0,1);
		return $this->query->get()->row(); 
	}

	public function insert($table, $field)
	{
		$this->db->insert($table, $field);
		return $this->db->insert_id();
	}

	public function insertBatch($table,$field)
	{
		$this->db->insert_batch($table, $field);
	}

	public function replace($table, $field)
	{
		$this->db->replace($table, $field);
	}

	public function update($table, $field, $where)
	{
		$this->db->update($table, $field, $where);
	}

	public function updateBatch($table, $field,$where=[])
	{
		if(count($where)>0)
		{
			$this->db->where($where);
		}
		$this->db->update_batch($table, $field, $this->id);
	}

	public function delete($id)
	{
		$table = explode(' ',$this->table);
		$this->db->delete($table[0], [
			$this->id=>$id
		]);
	}

	public function remove($table, $where=[])
	{
		$this->db->delete($table, $where);
	}

	public function removeBatch($table, $filter=[], $where = [], $id='')
	{
		if(count($where)>0)
		{
			$this->db->where($where);
		}
		if(count($filter)>0)
		{
			$this->db->where_in($id==''?$this->id:$id,$filter);
		}
		$this->db->delete($table);
		foreach($filter as $id)
		{
			$path = $this->session->location . '/' .$id .'.dat';
			if(file_exists($path))
			{
				unlink($path);
			}
		}
	}
}