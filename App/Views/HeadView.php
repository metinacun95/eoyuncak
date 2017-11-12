<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title><?php echo $title; ?></title>
<?php
		for($i = 0; $i<count($js); $i++){
		?>
	<script type="text/javascript" src="<?php echo $link."js/".$js[$i]; ?>?v=<?php echo time(); ?>"></script>
<?php
		}
		for($i = 0; $i<count($css); $i++){
		?>
	<link rel="stylesheet" href="<?php echo $link."css/".$css[$i]; ?>?v=<?php echo time(); ?>" />
<?php
		}
	?>
</head>
<body>