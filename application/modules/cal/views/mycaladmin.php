<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE>
<html>
<head>
	<title>My Calendar</title>
	<meta charset="UTF-8">

    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
    <!-- link jquery ui css-->
    <link href="<?php echo base_url('assets/js/jquery-ui-1.11.4/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!--include jquery library-->
    <script src="<?php echo base_url('assets/js/jquery-1.12.0.min.js'); ?>"></script>
    <!--load jquery ui js file-->
    <script src="<?php echo base_url('assets/js/jquery-ui-1.11.4/jquery-ui.min.js'); ?>"></script>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/js/jquery-ui-1.11.4/jquery-ui.css"); ?>">
	
	<style>
	
	</style>
	
</head>
<body>

<div class="container">
	
	<div class="panel panel-primary">
		<div class="panel-heading"><h4><b>Senarai kerja</b></h4></div>
		<div class="panel-body">
			 <table class="table">
				<thead>
					<th >Tarikh</th>
					
					<th >Perkara</th>
					
					<th> Jam </th>
				</thead>
				<?php foreach ($result as $snr) { ?>
				<tbody>
					<td><a href="<?php base_url()?>update/<?php echo $snr->trkh; ?>" /> <?php echo $snr->trkh; ?> </a></td>
					
					<td><?php echo $snr->data; ?></td>
					
					<td><?php echo $snr->jam; ?></td>
				<?php } ?>
				</tbody>
		</div>
	</div>
</div>


</body>
</html>

