<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="shortcut icon" href="http://snkpk.web.id/wp-content/uploads/2016/04/cropped-logo-snkpk.png" type="image/x-icon">
	<?= $bootstrap ?>
</head>
<body>
	<div style="width:90%;margin:auto;padding-top:15px"> 
		<header>
		<nav class="navbar navbar-default navbar-fixed">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				<?php if(isset($logedOut)): ?>
					<?php foreach($logedOut as $a): ?>
						<li>
							<a  href="<?= $a['action'] ?>"><?= $a['label'] ?></a>
						</li>
					<?php endforeach ?>
				<?php endif ?>
				<?php if(isset($author)): ?>
					<?php foreach($author as $a): ?>
						<li>
							<a href="<?= $a['action'] ?>"#><?= $a['label'] ?></a>
						</li>
					<?php endforeach ?>
				<?php endif ?>
				</ul>
			</div>
		</nav>
		</header>
		<section>
			<img src="http://snkpk.web.id/wp-content/uploads/2017/04/unnes.jpeg" align="center" width="100%">
			<h1 align="center"><?= $title ?></h1>
			<?php if($message):?>
				<div class="alert alert-success">
		 			<strong>Success!</strong> <?= $message ?>.
				</div>
			<?php endif ?>


		</section>
		<footer>
			<p align="center">
				&#169; Copyright 2017 Harjito, email : harjito(at)mail(dot)unnes(dot)ac(dot)id<br>
				Web Developer
			</p>
		</footer>
	</div>
</body>
</html>