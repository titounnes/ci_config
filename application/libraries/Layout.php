<?php 

class Layout {

	protected $content ='';
	protected $info = [];

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->config('assets');
		$this->CI->load->library(['session']);
		$this->CI->load->database();
		if( ! isset($this->CI->session->{'abstract'}) )
		{
			$limiter = $this->CI->db->get('limiter')->result();
			$lim = [];
			
			foreach($limiter as $l)
			{
				$lim[$l->section] = $l->time;
				$this->info[$l->section] = $l->time;
			}
			$this->CI->session->set_userdata($lim);
		}
		else
		{
			$info = ['abstract','fullpapper','payment_listener','payment_writer','event'];
			foreach($info as $i)
			{
				$this->info[$i] = $this->CI->session->{$i};
			}
		}
		
	}

	private function heading()
	{
		?>
		<html>
			<head>
				<title> SNKPK Kimia - <?= $this->CI->config->item('title') ?> </title>
				<meta name="description" content="Seminar Nasional Kimia dan Pendidikan Kimia Jurusan Kimia FMIPA UNNES">
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
			if(in_array(2, $this->CI->session->roles))
			{
				array_push($config, 'teller');
			}	
			array_push($config, 'logedIn');
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
					<?php ?>
					<?php if(isset($author)): ?>
						<?php foreach($author as $k=>$a): ?>
							<?php 
							$ids = explode('/',$a['action']);
							$id = $ids[count($ids)-1];
							?>
							<a id="<?=$id?>" href="/<?= $a['action'] ?>#<?=$id?>"><?= $a['label'] ?></a>
						<?php endforeach ?>
					<?php endif ?>
					<? ?>
					<?php if(isset($teller)): ?>
						<?php foreach($teller as $a): ?>
							<?php
							$ids = explode('/',$a['action']);
							$id = $ids[count($ids)-1];
							?>
							<a id="<?=$id?>" href="/<?= $a['action'] ?>#<?=$id?>"><?= $a['label'] ?></a>
						<?php endforeach ?>
					<?php endif ?>
					<?php if(isset($logedIn)): ?>
						<?php
						$ids = explode('/',$logedIn['action']);
						$id = $ids[count($ids)-1];
						?>
						<a id="<?=$id?>" href="/<?= $logedIn['action'] ?>#<?=$id?>"><?= $logedIn['label'] ?></a>
					<?php endif ?>
				<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
			</nav>
			<div>
				<marquee>Info tanggal penting: Batas akhir  penerimaan abstract pada <b>tanggal <?=date('d M Y',strtotime($this->info['abstract']))?> pukul <?=date('H:i',strtotime($this->info['abstract']))?></b>, Batas akhir  penerimaan naskah lengkap pada <b>tanggal <?=date('d M Y',strtotime($this->info['fullpapper']))?> pukul <?=date('H:i',strtotime($this->info['fullpapper']))?></b>, Batas akhir  pembayaran peserta pemakalah pada <b>tanggal <?=date('d M Y',strtotime($this->info['payment_writer']))?> pukul <?=date('H:i',strtotime($this->info['payment_writer']))?></b>, Batas akhir  pembayaran peserta pendengar pada <b>tanggal <?=date('d M Y',strtotime($this->info['payment_listener']))?> pukul <?=date('H:i',strtotime($this->info['payment_listener']))?></b> , Pelaksanaan seminar pada <b>tanggal <?=date('d M Y',strtotime($this->info['event']))?> pukul <?=date('H:i',strtotime($this->info['event']))?></marquee><hr>
			</div>
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
						Email: <a href="mailto:snkpk.unnes@gmail.com">snkpk(dot)unnes(@)gmail(dot)com</a> &nbsp;Fax:  <a href="tel:+62248508035">024-850-8035</a> <br>
						Ella Kusumastuti <a href="tel:+6285730327960">0857-3032-7960</a>&nbsp; 
						Willy Tirza Eden <a href="tel:+6285226059090">0852-2605-9090</a>&nbsp;
						Nuni Widiarti <a href="tel:+6285741233155">0857-4123-3155</a>
					</p>
					<hr>
					<p align="center">
						&#169; Copyright 2017 Harjito, email : harjito(at)mail(dot)unnes(dot)ac(dot)id<br>
						Web Developer
					</p>
				</footer>
			</div>
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
			/*var target = window.location.href.split('#');
			document.getElementById(target[1]).focus();*/
		}
		
		function printing(target)
		{
			printFrame.focus();
			printFrame.print();
	}
		
</script>
				</body>
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

