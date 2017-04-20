<?php 

class Layout {

	protected $content ='';

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->config('assets');
		$this->CI->load->library(['session']);
	}

	private function heading()
	{
		?>
		<html>
			<head>
				<title> SNKPK Kimia - <?= $this->CI->config->item('title') ?> </title>
				<meta name="description" content="E-learning terintegrasi Sistem Informasi Akademik">
        		<meta content='id' name='language'/>
        		<meta content='id' name='geo.country'/>
        		<meta content='Indonesia' name='geo.placename'/>
        		<meta name="keywords" content="SNKPK,KIMIA,UNNES">
        		<meta name="author" content="Harjito, harjito@mail.unnes.ac.id">
        		<link rel="shortcut icon" href="http://snkpk.web.id/wp-content/uploads/2016/04/cropped-logo-snkpk.png" type="image/x-icon">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<?= $this->CI->config->item('bootstrap') ?>
				<?= $this->CI->config->item('css') ?>
			</head>
			<body onload="activate()">
		<?php
	}

	private function menubar()
	{
		
		$config = ['bootstrap','title'];
		if($this->CI->session->logedIn)
		{
			if(in_array(3, $this->CI->session->roles))
			{
				array_push($config, 'author');
			}	
		}
		else
		{
			array_push($config, 'logedOut');
		}
		foreach($config as $c)
		{
			${$c} = $this->CI->config->item($c);
		}
		
		?>
		<div style="width:90%;margin:auto;padding-top:15px"> 
			<header>
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
				<div class="topnav" id="myTopnav">
					<a class="navbar-brand" href="#" onclick="myFunction()">
        				<img alt="Brand"  width="25px" src="http://snkpk.web.id/wp-content/uploads/2016/04/cropped-logo-snkpk.png">
      				</a>
					<?php if(isset($logedOut)): ?>
						<?php foreach($logedOut as $k=>$a): ?>
							<?php
							$ids = explode('/',$a['action']);
							$id = $ids[count($ids)-1];
							?>
							<a id="<?=$id?>" href="/<?= $a['action'] ?>#<?=$id?>"><?= $a['label'] ?></a>
						<?php endforeach ?>
					<?php endif ?>
					<?php if(isset($author)): ?>
						<?php foreach($author as $a): ?>
							<?php
							$ids = explode('/',$a['action']);
							$id = $ids[count($ids)-1];
							?>
							<a id="<?=$id?>" href="/<?= $a['action'] ?>#<?=$id?>"><?= $a['label'] ?></a>
						<?php endforeach ?>
					<?php endif ?>
					<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
			</nav>
			</header>
		<?php
	}

	private function message()
	{
		$message = $this->CI->session->validation_errors;
		?>
		<?php if($message):?>
			<section>
				<div class="alert alert-success">
		 			<strong>Success!</strong> <?= $message ?>.
				</div>
			</section>
		<?php endif ?>
		<?php
	}

	private function footer()
	{
		?>
				<footer>
					<p align="center">
						Diskusi dan tanya jawab: <a href="https://goo.gl/0JPa7C" target="_blank">Group Whatsapp</a> <a target="_blank" href="https://goo.gl/a9cKam">Group Facebook</a><br>
						&#169; Copyright 2017 Harjito, email : harjito(at)mail(dot)unnes(dot)ac(dot)id<br>
						Web Developer
					</p>
				</footer>
			</div>
		</body>
		<script>
		function myFunction() {
		    var x = document.getElementById("myTopnav");
		    if (x.className === "topnav") {
		        x.className += " responsive";
		    } else {
		        x.className = "topnav";
		    }
		}
		function activate()
		{
			var target = window.location.href.split('#');
			document.getElementById(target[1]).focus();
		}
		</script>
		</html>
		<?php
	}

	private function content()
	{
		?>
		<section>
			<?= $this->content ?>
		</section>
		<?php
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function render()
	{
		$this->heading();
		$this->menubar();
		$this->content();
		$this->footer();
	}
}

