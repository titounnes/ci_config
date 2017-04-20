<?php 

class Table {

	protected $title;
	protected $header = [];
	protected $rows = [];
	protected $id = [];
	protected $anchor;
	protected $currentRow;

	function __construct()
	{
		$this->CI =& get_instance();
	}

	public function setTitle($title='Table Tanpa Judul')
	{
		$this->title = $title;
	}

	public function setHeader($header = '')
	{
		if($header != '')
		{
			array_push($this->header, $header);
		}
	}

	public function newRow($id)
	{
		$this->currentRow = count($this->rows);
		$this->id[$this->currentRow] = $id;
	}

	public function setCell($data = '')
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


	public function setAnchor($anchor)
	{
		if($this->anchor =='')
		{
			$this->anchor= $anchor;	
		}  

		/*foreach($anchor as $k=>$a)
		{
			var_dump($k);
			$this->rows[$this->currentRow] .= '<td><a class="btn btn-success" href="/' . $a .'/'. $this->id[$this->currentRow] . '"><?=$k?></a></td>';	
		}*/
	}

	public function render()
	{
		?>
		<html>
			<head>
				<title> myApp - <?= $this->title ?> </title>
				<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			</head>
			<body>
				<table class="table table-bordered">
					<thead>
						<caption><?= $this->title ?></caption>
						<caption><a class="btn btn-info" href="/<?= $this->anchor['edit'] ?>/">Insert</a></caption>
						<?php foreach($this->header as $h): ?>
							<th><?= $h ?></th>
						<?php endforeach ?>
					</thead>
					<tbody>
						<?php foreach($this->rows as $k=>$r): ?>
						<tr><?= $r ?>
							<td>
								<a class="btn btn-success" href="/<?= $this->anchor['edit'] ?>/<?= $this->id[$k] ?>">Edit</a>
							</td>
							<td>
								<a class="btn btn-success" href="/<?= $this->anchor['read'] ?>/<?= $this->id[$k] ?>">Read</a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</body>
		</html>
		<?php
	}
}