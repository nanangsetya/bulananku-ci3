
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>E-Voting</title>

		<meta name="description" content="3 styles with inline editable feature" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/select2.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/assets/css/ace-rtl.min.css" />

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?=base_url();?>assets/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?=base_url();?>Home/index" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							E-Voting
						</small>
					</a>
				</div>

				<div class="navbar-button navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="dropdown-modal">
							<a class="dropdown-toggle" href="<?=base_url('Auth');?>">
								<i class="fa fa-fw fa-key"></i> Login
							</a>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">

			<div class="main-content">
				<div class="main-content-inner">
					
					<div class="page-content">

						<div class="page-header">
							<center>
								<h1>
									Pemilihan Ketua OSIS SMA
								</h1>
							</center>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-sm-6">
								<h3 class="header smaller lighter green">
									<i class="fa fa-fw fa-bullseye"></i>
									Grafik Pie
								</h3>

								<?php 
							
									$dataPie = [];

									$total = $grafik->num_rows();
									
									foreach ($grafik->result() as $key) {

										$y = (int)$key->total / (int)$total * 100;

										$a = array(
											'name' => $key->ketua_kandidat.' & '.$key->wakil_kandidat,
											'y' => $y
										);

										array_push($dataPie, $a);
									}

								?>

								<div id="pie"></div>
							</div>

							<div class="col-sm-6">
								<h3 class="header smaller lighter blue">
									<i class="fa fa-fw fa-bar-chart-o"></i>
									Grafik Bar
								</h3>

								<?php 

									$dataBar = [];
									$nameBar = [];

									foreach ($grafik->result() as $key) {
										$nama = $key->ketua_kandidat.' & '.$key->wakil_kandidat;

										array_push($nameBar, $nama);
										array_push($dataBar, (int)$key->total);
									}

								?>

								<div id="bar"></div>
							</div>
						</div>

						<div class="row">
							<h3 class="header smaller lighter"><center>Kandidat</center></h3>
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div id="user-profile-1" class="user-profile row">
									<?php foreach ($kandidat->result() as $key) {?>
										<div class="col-xs-12 col-sm-4 center">
											<div>
												<span class="profile-picture">
													<img class="img-responsive" style="max-width: 250px; " alt="Alex's Avatar" src="<?=base_url('assets/foto/').$key->foto;?>" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<span class="white"><?=$key->no_urut.'. '.$key->ketua_kandidat.' & '.$key->wakil_kandidat;?></span>
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											<div class="profile-contact-info">
												<div id="accordion" class="accordion-style1 panel-group">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseVisi<?=$key->id_kandidat;?>">
																	<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																	&nbsp;Visi
																</a>
															</h4>
														</div>

														<div class="panel-collapse collapsing" id="collapseVisi<?=$key->id_kandidat;?>">
															<div class="panel-body">
																<?=$key->visi;?>
															</div>
														</div>
													</div>

													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseMisi<?=$key->id_kandidat;?>">
																	<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
																	&nbsp;Misi
																</a>
															</h4>
														</div>

														<div class="panel-collapse collapsing" id="collapseMisi<?=$key->id_kandidat;?>">
															<div class="panel-body">
																<?=$key->misi;?>
															</div>
														</div>
													</div>
												</div>

											</div>

											<div class="hr hr16 dotted"></div>
										</div>
									<?php } ?>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>

		<script type="text/javascript">
			Highcharts.chart('pie', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: false,
			        type: 'pie'
			    },
			    title: {
			        text: 'Presentase Suara'
			    },
			    tooltip: {
			        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            dataLabels: {
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
			            }
			        }
			    },
			    series: [{
			        name: 'Kandidat',
			        colorByPoint: true,
			        data: <?php echo json_encode($dataPie) ?>
			    }]
			});
		</script>

		<script type="text/javascript">
			Highcharts.chart('bar', {
			    chart: {
			        type: 'column'
			    },
			    title: {
			        text: 'Jumlah Suara'
			    },
			    subtitle: {
			        text: 'OSIS SMA'
			    },
			    xAxis: {
			        categories: <?php echo json_encode($nameBar) ?>,
			        crosshair: true
			    },
			    yAxis: {
			        min: 0,
			        title: {
			            text: ''
			        }
			    },
			    tooltip: {
			        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			            '<td style="padding:0"><b>{point.y:.0f} suara</b></td></tr>',
			        footerFormat: '</table>',
			        shared: true,
			        useHTML: true
			    },
			    plotOptions: {
			        column: {
			            pointPadding: 0.2,
			            borderWidth: 0
			        }
			    },
			    series: [{
		        name: 'Perolehan Suara',
		        data: <?php echo json_encode($dataBar); ?>
		    }]
			});
		</script>

		<!--[if !IE]> -->
		<script src="<?=base_url();?>assets/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?=base_url();?>assets/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?=base_url();?>assets/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="<?=base_url();?>assets/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?=base_url();?>assets/assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/jquery.gritter.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/bootbox.js"></script>
		<script src="<?=base_url();?>assets/assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/select2.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/spinbox.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/bootstrap-editable.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/ace-editable.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->
		<script src="<?=base_url();?>assets/assets/js/ace-elements.min.js"></script>
		<script src="<?=base_url();?>assets/assets/js/ace.min.js"></script>

	</body>
</html>
