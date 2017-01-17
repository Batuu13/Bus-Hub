<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }


$stmt = $db->prepare('SELECT count(*) as Count, sum(Price) as Total FROM ticket');

			$stmt->execute();
			$ticket = $stmt->fetch();
$stmt = $db->prepare('SELECT count(*) as Count FROM bus');

			$stmt->execute();
			$bus = $stmt->fetch();
$stmt = $db->prepare('SELECT count(*) as Count FROM driver,stationer,host');

			$stmt->execute();
			$personal = $stmt->fetch();



?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $ticket['Count']; ?></div>
							<div class="text-muted">Sold Ticket Count</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $ticket['Total']; ?></div>
							<div class="text-muted">Total Earnings</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-star"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $bus['Count']; ?></div>
							<div class="text-muted">Total Busses</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $personal['Count']; ?></div>
							<div class="text-muted">Total Staff</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		

								
		<div class="row">
			<div class="col-md-8">
			
				<div class="panel panel-default">
					<div class="panel-heading" id="accordion"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg> Last Transactions</div>
					<div class="panel-body">
                   <table class="table table-hover">
                      
                   <thead>
                   <tr>
                   <td>ID</td>
                   <td>Log</td>
                   <td>Date</td>
                   </tr>
                   </thead>
                   <tbody>
						<?php
						
						$stmt = $db->prepare('SELECT * FROM log LIMIT 8');

					$stmt->execute();
					$logs = $stmt->fetchAll();
				foreach($logs as $log)				
				{ 
					echo' <tr>
                   <td>'. $log['LogID'].'</td>
                   <td>'. $log['Description'].'</td>
                   <td>'. $log['Date'].'</td>
                   </tr>';
				}
						?>
                        </tbody>
                      </table>   
					</div>
				
				</div>
				
			</div><!--/.col-->
			
			
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="../style/js/jquery-1.11.1.min.js"></script>
	<script src="../style/js/bootstrap.min.js"></script>
	<script src="../style/js/chart.min.js"></script>
	<script src="../style/js/chart-data.js"></script>
	<script src="../style/js/easypiechart.js"></script>
	<script src="../style/js/easypiechart-data.js"></script>
	<script src="../style/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
