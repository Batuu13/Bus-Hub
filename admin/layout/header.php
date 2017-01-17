<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="../style/css/bootstrap.min.css" rel="stylesheet">
<link href="../style/css/datepicker3.css" rel="stylesheet">

<link href="style/css/astyles.css" rel="stylesheet">
<script src="../style/js/bootstrap-datepicker.js"></script>
<script src="../style/js/lumino.glyphs.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="../style/css/styles.css" rel="stylesheet">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<!--Icons-->


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Bus</span>Admin</a>

			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard </a></li>

			
			<li class="parent ">
				<a data-toggle="collapse" href="#sub-item-2">
					<span  href="#"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Busses </span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li class="">
						<a class="" href="busList.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Bus List
						</a>
					</li>
					<li class="">
						<a class="" href="addBus.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Bus
						</a>
					</li>
				</ul>
			</li>
            <li class="parent ">
				<a data-toggle="collapse" href="#sub-item-3">
					<span  href="#"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Tours </span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li class="">
						<a class="" href="tourList.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Tour List
						</a>
					</li>
					<li class="">
						<a class="" href="addTour.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Tour</a>
					</li>
				</ul>
			</li>
            <li class="parent ">
				<a data-toggle="collapse" href="#sub-item-4">
					<span  href="#"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Staff </span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li class="">
						<a class="" href="staffList.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Staff List
						</a>
					</li>
					<li class="">
						<a class="" href="addDriver.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Driver
						</a>
					</li>
                    <li class="">
						<a class="" href="addHost.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Host
						</a>
					</li>
                    <li class="">
						<a class="" href="addStationer.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Stationer
						</a>
					</li>
				</ul>
			</li>
            <li class="parent ">
				<a data-toggle="collapse" href="#sub-item-5">
					<span  href="#"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Types </span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li class="">
						<a class="" href="typeList.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Type List
						</a>
					</li>
					<li class="">
						<a class="" href="addBusType.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Bus Type
						</a>
					</li>
                    <li class="">
						<a class="" href="addPaymentType.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Payment Type
						</a>
					</li>
                    <li class="">
						<a class="" href="addBusModel.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Bus Model
						</a>
					</li>
                    <li class="">
						<a class="" href="addUserType.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add User Type
						</a>
					</li>
				</ul>
			</li>
            
			<li role="presentation" class="divider"></li>
			
		</ul>

	</div><!--/.sidebar-->
		
		
	