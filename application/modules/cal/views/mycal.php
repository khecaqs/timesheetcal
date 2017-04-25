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
    <link rel="stylesheet" href="/resources/demos/style.css">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/js/jquery-ui-1.11.4/jquery-ui.css"); ?>">
	<style type="text/css">
	.calendar{
		font-family: Arial; font-size: 12px;
	}
	table.calendar{
		margin: auto; border-collapse: collapse;
	}
	.calendar .days td{
		width: 80px; height: 80px; padding: 4px;
		border: 1px; solid #999;
		vertical-align: top;
		background-color: #5bc0de;
	}
	.calendar .days td:hover{
		background-color: #FFF;
	}
	.calendar .highlight{
		font-weight: bold; color: #00F;
	}
	</style>

			<script type="text/javascript">
					$(document).ready(function() {
						
						var day_data;
						var day_num;
						
						$("#dialog").dialog({
						autoOpen: false,
						show: {
							effect: "fade",
							duration: 1000
						},
						hide: {
							effect: "blind",
							duration: 500 
						},
						buttons: { 
							Ok: function() {
								//$("#nameentered").text($("#name").val());
								day_data = $( '#data' ).val();
								submit();
								$(this).dialog("close");
						   },
							Cancel: function () {
								$(this).dialog("close");
							}
						}
					});

					$('.calendar .day').click(function(){
						$("#dialog").dialog("open");
						day_num = $(this).find('.day_num').html();
					});
					
					function submit()
					{
						$.ajax({
							url: window.location,
							type: 'POST',
							data: {
								day: day_num,
								data: day_data
							},
							success: function(msg){
								//alert( msg )
								location.reload();
							}
						});
					}
					

				});
			</script>	
	
<!-- 	<script src="<?php //echo base_url("assets/js/jquery-1.12.0.min.js"); ?>" type="text/javascript"></script> -->
<!-- 	<script src="<?php //echo base_url("assets/js/1.11.4/jquery-ui.js"); ?>" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script> -->
  <!--   <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script> -->
</head>
<body>
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">	My Timesheet </div>
		<div class="panel-body">
			<?php echo $calendar; ?> 

			<div id="dialog" title="Kerja Hari Ini">
				<textarea id="data"></textarea>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading"> Senarai kerja </div>
		<div class="panel-body">
			<?php
				foreach ($senarai as $snr):
					//echo $snr->date;
					echo $snr->data;
				endforeach;
			?>
			
		</div>
	</div>
</div>
	<!-- <input type="button" id="open" value="Open Dialog" /> -->
	
	

</body>
</html>
