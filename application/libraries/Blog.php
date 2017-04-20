<?php 

class Blog {

	protected $data;
	protected $anchor = [];

	function __construct()
	{
		$this->CI =& get_instance();
	}

	
	public function setData($data)
	{
		$this->data = $data;
	}

	public function setAnchor($anchor = [])
	{
		$this->anchor = $anchor;
	}

	public function render()
	{
		?>
		<html>
			<head>
				<title> myApp - <?= $this->data->title ?> </title>
				<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			</head>
			<body>
				<section>
					<h1><?= $this->data->title ?></h1>
					<div><?= $this->data->content ?></div>
					<a class="btn btn-info" href="/<?= $this->anchor['edit'] ?>/<?= $this->data->id?>">Edit</a>
					<a class="btn btn-info" href="/<?= $this->anchor['back'] ?>">Kembali Ke Daftar</a>
				</section>
			</body>
		</html>
		<?php
	}
}